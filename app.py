from flask import Flask, render_template
import subprocess

app = Flask(__name__)

@app.route('/')
def home():
    # Execute your Python script and capture its output
    process = subprocess.Popen(['python', 'C:\Users\supra\Downloads\speech_recognition-main/speech_pygame'], stdout=subprocess.PIPE)
    output, _ = process.communicate()

    # Decode the output to string
    output = output.decode('utf-8')

    return render_template('index.html', output=output)

if __name__ == '__main__':
    app.run(debug=True)
