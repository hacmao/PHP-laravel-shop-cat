pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        script {
          dockerImage = docker.build registry + ":$BUILD_NUMBER"
        }

        sh 'docker image ls'
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
        script {
          docker.withRegistry('', dockerhubCredentials) {
            dockerImage.push()
          }
        }

      }
    }

  }
  environment {
    registry = 'hacmao/php-app'
    dockerhubCredentials = 'dockerhub_credential'
  }
}