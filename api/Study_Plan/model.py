import numpy as np
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
from sklearn.preprocessing import LabelEncoder, OneHotEncoder
from sklearn.cluster import KMeans
from sklearn.preprocessing import OneHotEncoder
import pickle

load_model = pickle.load(open('kmean_model.sav', 'rb'))


def get_study_plan(csv_file):
    print("file detected")
    data_frame1 = pd.read_csv('study_plan1.csv')
    data_frame1

    data_frame1['If you have a job, how much time do you spend on it?'].fillna(0, inplace=True)
    data_frame1["If you have a job, how much time do you spend on it?"].replace(
        ["1 hours", "2 hours", "3 hours", "4 hours", "5 hours", "6 hours", "7 hours", "8 hours", "9 hours", "10 hours",
         "11 hours", "12 hours", "13 hours", "14 hours", "15 hours", "16 hours", ],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], inplace=True)
    data_frame1["How much time do you spend on education? "].replace(
        ["1 hours", "2 hours", "3 hours", "4 hours", "5 hours", "6 hours", "7 hours", "8 hours", "9 hours", "10 hours",
         "11 hours", "12 hours", "13 hours", "14 hours", "15 hours", "16 hours", ],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], inplace=True)
    data_frame1["How much time does it take?"].replace(
        ["1 hours", "2 hours", "3 hours", "4 hours", "5 hours", "6 hours", "7 hours", "8 hours", "9 hours", "10 hours",
         "11 hours", "12 hours", "13 hours", "14 hours", "15 hours", "16 hours", ],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], inplace=True)
    data_frame1["How long does it take for a university outdoor activity ?"].replace(
        ["1 hours", "2 hours", "3 hours", "4 hours", "5 hours", "6 hours", "7 hours", "8 hours", "9 hours", "10 hours",
         "11 hours", "12 hours", "13 hours", "14 hours", "15 hours", "16 hours", ],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], inplace=True)
    data_frame1["How much time do you take for Lab Sessions and practical's?"].replace(
        ["1 hours", "2 hours", "3 hours", "4 hours", "5 hours", "6 hours", "7 hours", "8 hours", "9 hours", "10 hours",
         "11 hours", "12 hours", "13 hours", "14 hours", "15 hours", "16 hours", ],
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16], inplace=True)
    data_frame1['What is your academic year?'].replace(["Year 01", "Year 02", "Year 03", "Year 04", ], [1, 2, 3, 4],
                                                       inplace=True)

    data_frame1['Gender'].replace(["Male", "Female", ], [1, 0], inplace=True)
    data_frame1['Are you doing a job?'].replace(["Yes", "No", ], [1, 0], inplace=True)

    test1 = data_frame1["What is your hobby?"]
    test2 = data_frame1['What Is Your University?']
    test3 = data_frame1['What is your Faculty?']

    test1 = test1.to_numpy()
    test2 = test2.to_numpy()
    test3 = test3.to_numpy()

    if test1 == "Reading":
        print('okay')

        data = {'Playing': [0], 'Reading': [1], 'Watching Movie': [0], 'other': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data))

    elif test1 == "Playing":

        data = {'Playing': [1], 'Reading': [0], 'Watching Movie': [0], 'other': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data))

    elif test1 == "Watching Movie":

        data = {'Playing': [0], 'Reading': [0], 'Watching Movie': [1], 'other': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data))

    elif test1 == "other":

        data = {'Playing': [0], 'Reading': [0], 'Watching Movie': [0], 'other': [1]}
        data_frame1 = data_frame1.join(pd.DataFrame(data))

    data_frame1

    if test2 == "CINEC Campus Sri Lanka":
        print('okay')

        data1 = {'CINEC Campus Sri Lanka': [1], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "ESOFT Metro Campus":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [1],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "General Sir John Kotelawala Defence University":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [1], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "Horizon University":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [1],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "NSBM Green University":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [1], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "National Institute of Business Management":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [1],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "Rajarata university":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [1], 'Sri Lanka Institute of Information Technology (SLIIT)': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    elif test2 == "Sri Lanka Institute of Information Technology (SLIIT)":
        data1 = {'CINEC Campus Sri Lanka': [0], 'ESOFT Metro Campus': [0],
                 'General Sir John Kotelawala Defence University': [0], 'Horizon University': [0],
                 'NSBM Green University': [0], 'National Institute of Business Management': [0],
                 'Rajarata university': [0], 'Sri Lanka Institute of Information Technology (SLIIT)': [1]}
        data_frame1 = data_frame1.join(pd.DataFrame(data1))

    data_frame1

    if test3 == "School of Architecture":
        print('okay')

        data2 = {'School of Architecture': [1], 'School of Business': [0], 'School of Computing': [0],
                 'School of Engineering': [0], 'School of Hospitality': [0], 'School of Law': [0],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Business":
        data2 = {'School of Architecture': [0], 'School of Business': [1], 'School of Computing': [0],
                 'School of Engineering': [0], 'School of Hospitality': [0], 'School of Law': [0],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Computing":
        data2 = {'School of Architecture': [0], 'School of Business': [0], 'School of Computing': [1],
                 'School of Engineering': [0], 'School of Hospitality': [0], 'School of Law': [0],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Engineering":
        data2 = {'School of Architecture': [0], 'School of Business': [0], 'School of Computing': [0],
                 'School of Engineering': [1], 'School of Hospitality': [0], 'School of Law': [0],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Hospitality":
        data2 = {'School of Architecture': [0], 'School of Business': [0], 'School of Computing': [0],
                 'School of Engineering': [0], 'School of Hospitality': [1], 'School of Law': [0],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Law":
        data2 = {'School of Architecture': [0], 'School of Business': [0], 'School of Computing': [0],
                 'School of Engineering': [0], 'School of Hospitality': [0], 'School of Law': [1],
                 'School of Media Studies': [0]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    elif test3 == "School of Media Studies":
        data2 = {'School of Architecture': [0], 'School of Business': [0], 'School of Computing': [0],
                 'School of Engineering': [0], 'School of Hospitality': [0], 'School of Law': [0],
                 'School of Media Studies': [1]}
        data_frame1 = data_frame1.join(pd.DataFrame(data2))

    data_frame1

    features1 = data_frame1.drop(columns=['What is your hobby?', 'What Is Your University?', 'What is your Faculty?'],
                                 axis=1)
    features1.to_csv('chek_next.csv')
    input_data_np_array = np.asarray(features1)
    input_data_reshape = input_data_np_array.reshape(1, -1)
    prediction = load_model.predict(input_data_reshape)
    prediction

    if prediction == 0:
        return 1
    elif prediction == 1:
        return 2
    elif prediction == 2:
        return 3
    elif prediction == 3:
        return 4


# print(get_study_plan('study_plan1.csv'))