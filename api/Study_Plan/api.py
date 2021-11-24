from flask import Flask, request, url_for, redirect, render_template, send_file
from flask_cors import CORS
import json
from Study_Plan.model import get_study_plan
import csv

app = Flask(__name__)
CORS(app)


@app.route('/study_plan', methods=['GET', 'POST'])
def study_plan():
    grade_point = request.json['grade_point']
    question_1 = request.json['question_1']
    question_2 = request.json['question_2']
    question_3 = request.json['question_3']
    question_4 = request.json['question_4']
    question_5 = request.json['question_5']
    question_6 = request.json['question_6']
    question_7 = request.json['question_7']
    question_8 = request.json['question_8']
    question_9 = request.json['question_9']
    question_10 = request.json['question_10']
    question_11 = request.json['question_11']
    question_12 = request.json['question_12']
    question_13 = request.json['question_13']
    question_14 = request.json['question_14']
    question_15 = request.json['question_15']
    question_16 = request.json['question_16']
    question_17 = request.json['question_17']
    question_18 = request.json['question_18']
    question_19 = request.json['question_19']

    header = ['Gender', 'Age', 'What time do you wake up in the morning?',
              'What time do you have breakfast?', 'Are you doing a job?',
              'If you have a job, how much time do you spend on it?', 'How much time do you spend on education?',
              'What time do you have lunch?', 'What is your hobby?', 'How much time does it take?',
              'What time do you have dinner?', 'What Is Your University?', 'What is your Faculty?',
              'What is your academic year?', 'What has been your GPA in the last years?',
              'How many repeats did you have Last year?', 'What time do you go to bed at night?',
              'How long does it take for a university outdoor activity ?',
              'How much time do you take for Lab Sessions and practical\'s?']
    data = [question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9,
            question_10, question_11, question_12, question_13, question_14, question_15, question_16, question_17,
            question_18, question_19]

    with open('upload.csv', 'w', encoding='UTF8') as f:
        writer = csv.writer(f)
        writer.writerow(header)
        writer.writerow(data)

    result = get_study_plan('upload.csv')

    return json.loads('{ "respond" : ' + str(result) + '}')


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)
