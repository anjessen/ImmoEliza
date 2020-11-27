import pandas as pd
import numpy as np
import pickle
import xgboost
import sklearn


def load_dict(path):
    """Read and Load a .csv into a dictionary"""
    df = pd.read_csv(path, index_col=0)
    dico = df.to_dict()
    return dico


def predict_price(path, datas):
    """Load the ML model , predict the price with a data dictionary"""
    model = pickle.load(open(path, "rb"))
    to_predict = pd.DataFrame(data=datas)
    prediction = model.predict(to_predict)[0]
    return prediction


def get_commune_rank_id(path, commune):
    commune = commune.upper()
    commune_rank_dict = load_dict(path)
    commune_rank_id = commune_rank_dict['price_per_m²'][commune]
    return int(commune_rank_id)


def get_sate_building(state):
    state_building_index = {'as new': 1, 'good': 2, 'just renovated': 3, 'to be done up': 4,
                            'to renovate': 5, 'to restore': 6}
    state_building_id = state_building_index[state]
    return state_building_id


def replace_to_nan(input_data):
    if input_data['garden_area'] == 0:
        input_data['garden_area'] = [np.nan]
    if input_data['terrace_area'] == 0:
        input_data['terrace_area'] = [np.nan]
    if input_data['construction_year'] == 0:
        input_data['construction_year'] = [np.nan]
    if input_data['number_of_facades'][0] < 2:
        input_data['number_of_facades'] = [np.nan]

    return input_data


def input_data_maker(content):
    if content['type_of_property'] == 'House':
        content_house = ['number_of_facades', 'house_area', 'number_of_rooms',
                         'surface_of_the_land', 'garden_area', 'terrace_area',
                         'state_of_the_building', 'construction_year']

        input_data = {'number_of_facades': [3], 'house_area': [128], 'number_of_rooms': [2],
                      'surface_of_the_land': [845], 'garden_area': [0], 'terrace_area': [0],
                      'state_of_the_building': [2], 'construction_year': [1954], 'rank_commune': [129]}

        for i in content_house:
            input_data[i] = [content[i]]

    elif content['type_of_property'] == 'Apartment':
        content_apartment = ['number_of_facades', 'house_area', 'number_of_rooms', 'fully_equipped_kitchen',
                             'garden', 'garden_area', 'terrace', 'terrace_area',
                             'state_of_the_building', 'construction_year']

        input_data = {'number_of_facades': [3], 'house_area': [128], 'number_of_rooms': [2],
                      'fully_equipped_kitchen': [1], 'garden': [0], 'garden_area': [0], 'terrace': [0],
                      'terrace_area': [0],
                      'state_of_the_building': [2], 'construction_year': [1954], 'rank_commune': [129]}

        for i in content_apartment:
            input_data[i] = [content[i]]

    return replace_to_nan(input_data)
