#!/usr/bin/env python
# coding: utf-8
import nltk
from nltk.corpus import stopwords
from nltk.cluster.util import cosine_distance
import numpy as np
import networkx as nx


def read_article(filedata):
    # new edit---------------/
    # tokenizer = nltk.data.load('tokenizers/punkt/english.pickle')
    # print(tokenizer.tokenize(filedata))
    # article = tokenizer.tokenize(filedata)
    # new edit---------------/

    # commented---------/
    print("before article split============", filedata);
    article = filedata.split(". ")
    # commented---------/
    print("After article split============", article);

    # print("arty",article);
    sentences = []
    # empty array
    # print("sen sen sen",sentences);

    for sentence in article:
        print("sentences before loop===== ", sentence)
        sentences.append(sentence.replace("[^a-zA-Z]", " ").split(" "))
    sentences.pop()
    print("sentences after loop===== ", sentences)
    # print(len(sentences))
    return sentences


def sentence_similarity(sent1, sent2, stopwords=None):
    if stopwords is None:
        stopwords = []

    sent1 = [w.lower() for w in sent1]
    sent2 = [w.lower() for w in sent2]
    # print("sen1 :::::",sent1)
    # print("sen2s :::::",sent2)
    all_words = list(set(sent1 + sent2))
    print("alllllllllllllllz", all_words)
    vector1 = [0] * len(all_words)
    # print("vec1",vector1)
    vector2 = [0] * len(all_words)

    # build the vector for the first sentence
    for w in sent1:
        print("sent1", sent1);
        if w in stopwords:
            continue
        vector1[all_words.index(w)] += 1

    # build the vector for the second sentence
    for w in sent2:
        print("sent2", sent2);
        if w in stopwords:
            continue
        vector2[all_words.index(w)] += 1

    return 1 - cosine_distance(vector1, vector2)


def build_similarity_matrix(sentences, stop_words):
    # Create an empty similarity matrix
    # print(len(sentences)); number of sentences 11
    similarity_matrix = np.zeros((len(sentences), len(sentences)))
    print("similarity_matrix================ \n", similarity_matrix);
    # range means 0 1 2 3 4 5 6 7 8 9 10 11
    for idx1 in range(len(sentences)):
        for idx2 in range(len(sentences)):
            if idx1 == idx2:  # ignore if both are same sentences
                continue
            similarity_matrix[idx1][idx2] = sentence_similarity(sentences[idx1], sentences[idx2], stop_words)
    print("similarity_matrix")
    print(similarity_matrix)
    return similarity_matrix


def generate_summary(file_name, top_n=1):
    nltk.download("stopwords")
    stop_words = stopwords.words('english')
    # print(stop_words);
    summarize_text = []

    # Step 1 - Read text anc split it
    sentences = read_article(file_name)
    # print("function articles",sentences)
    # Step 2 - Generate Similary Martix across sentences
    sentence_similarity_martix = build_similarity_matrix(sentences, stop_words)

    # Step 3 - Rank sentences in similarity martix
    sentence_similarity_graph = nx.from_numpy_array(sentence_similarity_martix)
    # print("dshfsdjhf sjdhdfbhsdf",sentence_similarity_graph,"uhjhjh")

    scores = nx.pagerank(sentence_similarity_graph)
    print("scores", scores)
    # print("score :  ",scores);
    # for i,s in enumerate(sentences):
    #     print(i);
    #     print(s);

    # Step 4 - Sort the rank and pick top sentences
    ranked_sentence = sorted(((scores[i], s) for i, s in enumerate(sentences)), reverse=True)
    # print("Indexes of top ranked_sentence order are ", ranked_sentence)

    for i in range(top_n):
        summarize_text.append(" ".join(ranked_sentence[i][1]))

    # Step 5 - Offcourse, output the summarize texr
    # print("Summarize Text: \n", ". ".join(summarize_text))
    # print( ". ".join(summarize_text))
    x = ". ".join(summarize_text)
    print(x)
    return summarize_text


# let's begin
generate_summary(
    "I love my kitties. The feel of their fur under my fingertips is soothing. They lovingly interrupt my work and remind me of the pleasures of the here and now. When I’m blue, they brighten my day and comfort me. My kitties make my world a nicer place to be. ",
    1)

# generate_summary("A hobby is an amusement or interesting pursuit which a person follows during his leisure or free time. A hobby, therefore, provides diversion from one’s main business. What is a hobby to one man may be business for another. For example, to one man, photography may be a profession while to another, it may be a hobby. Having a hobby that we enjoy brings us joy and enriches our lives. It gives us something fun to do during our leisure time and affords us the opportunity to learn new skills. The best way to cultivate a new hobby is to try something new. The world is full of wonderful, exciting activities that we can explore and adopt as our own. Of course, all of us are unique and, therefore, our interests and hobbies vary. But once we find a hobby that we truly enjoy and are passionate about, we become hooked. It becomes part of our lives and captivates us in a very personal way. ",1);
