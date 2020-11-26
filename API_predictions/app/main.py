from flask import Flask, request, jsonify
from app.functions import *

app = Flask(__name__)


@app.route('/')
def home():
    return 'Belgian house price prediction'


@app.route('/predict', methods=['POST'])
def prediction():
    content = request.get_json()
    commune_rank_id = get_commune_rank_id('./ML_Model/Datas/commune_rank_index.csv', content['locality'])
    state_index = get_sate_building(content['state_of_the_building'])

    input_data = input_data_maker(content)

    input_data['rank_commune'] = [commune_rank_id]
    input_data['state_of_the_building'] = [state_index]

    path_to_model = './ML_Model/Datas/House_model.pkl' if content['type_of_property'] == "House" \
        else './ML_Model/Datas/Apartment_model.pkl'

    price = predict_price(path_to_model, input_data)

    return jsonify(price_of_the_estate=f"{price}")
