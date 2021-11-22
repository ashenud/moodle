# Import libraries
from flask import Flask, jsonify, request, url_for
from flask_restful import Api, Resource
from flask_cors import CORS, cross_origin
import summary as summarizeed
import requests

app = Flask(__name__)  # Create Flask object
cors = CORS(app, resources={r"*": {"origins": "*"}})  # Handle CORS
api = Api(app)  # Create Api object


# Verify json data
def verify_summarization_data(receivedData):
    if receivedData == " ":
        return 300
    else:
        return 200


# Summarize Endpoint
class Summarize(Resource):
    def post(self, ratio):
        receivedData = request.get_json()  # Receieve data
        status_code = verify_summarization_data(receivedData)  # Verify data
        if (status_code != 200):
            returnJson = {
                'msg': 'Invalid data',
                'status': 200
            }
            return jsonify(returnJson)
        text = receivedData['text']
        try:
            res = summarizeed.create_sumall(text, ratio)  # Summarize
            returnJson = {
                'result': res,
                'status': 200
            }
            return jsonify(returnJson)
        except Exception as e:
            returnJson = {
                'msg': 'Error',
                'status': 200
            }
            return jsonify(returnJson)


api.add_resource(Summarize, '/api/summarize')  # Add Summarize Endpoint to Api


# Home route
@app.route('/api')
def welcome():
    return 'Text Summarization'


# Run App
if __name__ == "__main__":
    app.run(host="0.0.0.0", port="5005", debug=False)
