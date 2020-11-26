from flask import Flask, request, jsonify
import random

app = Flask(__name__)


@app.route('/')
def home():
    return 'Belgian house price prediction'


@app.route('/predict', methods=['POST'])
def prediction():
    content = request.get_json()
    price = random.randint(50000, 500000)
    return jsonify(price_of_the_estate=f"{price}")

'''@app.route('/predict/<seller_available>/<month>/<customer_visiting_website>')
def prediction(month, customer_visiting_website, seller_available):
    return f"Prediction for {month} is {random.randint(2000, 5000)}"'''



