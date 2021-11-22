import textract

text = textract.process("upload/test.docx")
arr = str(text).replace("\\n", "")