pipeline {
  agent {
    kubernetes {
      label "kubernetes"
      idleMinutes 5
      yamlFile "build-pod.yaml"
      defaultContainer "docker"
    }
  }

  triggers {
    pollSCM "* * * * *"
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

    stage("Login") {
      steps {
        sh 'echo $DOCKERHUB_CRE_USR:$DOCKERHUB_CRE_PSW'
        sh 'docker login -u $DOCKERHUB_CRE_USR -p $DOCKERHUB_CRE_PSW'
      }
    }

    stage('Deploy') {
      steps {
        sh 'docker push $registry:$BUILD_NUMBER'
      }
    }
  }

  post {
    always {
      sh 'docker logout'
    }
  }
}
