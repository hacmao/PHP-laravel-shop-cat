pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        sh 'echo "hello world"'
      }
    }

    stage('Test') {
      steps {
        sh '''echo "Test start"
sleep 60
echo "Test done"'''
      }
    }

    stage('Deploy') {
      steps {
        echo 'Deploy Done'
      }
    }

  }
}