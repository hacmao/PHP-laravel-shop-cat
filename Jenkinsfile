pipeline {
  agent {
    kubernetes {
      label "kubernetes"
      idleMinutes 5
      yamlFile "build-pod.yaml"
      defaultContainer "docker"
    }
  }
  stages {
    stage('Build') {
      steps {
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
        echo 'Deploy Done'
      }
    }

  }
}