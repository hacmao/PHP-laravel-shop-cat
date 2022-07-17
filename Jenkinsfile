pipeline {
  agent {
    kubernetes {
      label "kubernetes"
      idleMinutes 5
      yamlFile "build-pod.yaml"
      defaultContainer "docker"
    }
  }

  environment {
    registry = 'hacmao/php-app'
    DOCKERHUB_CRE = credentials('docker-token')
  }

  stages {
    stage('Build') {
      steps {
        sh 'printenv'
        sh 'docker build -t $registry:$BUILD_NUMBER .'
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

    stage("Login") {
      steps {
        sh 'echo $DOCKERHUB_CRE_USR:$DOCKERHUB_CRE_PSW'
        sh 'docker login -u $DOCKERHUB_CRE_USR -p $DOCKERHUB_CRE_PSW'
      }
    }

    stage('Deploy') {
      steps {
        echo 'docker push $registry:$BUILD_NUMBER'
      }
    }
  }
}
