pipeline {
  agent any
  stages {
    stage('verify installations') {
      steps {
        sh 'php --version'
      }
    }
    stage('run tests') {
      steps {
        sh 'composer install'
        sh 'composer require --dev phpunit/phpunit ^10'
        sh './vendor/bin/phpunit --version'
        sh './vendor/bin/phpunit tests'
      }
    }
    stage ('run tests with TestDox') {
      steps {
        sh './vendor/bin/phpunit --testdox tests'  
    
      }
    }
    stage ('get_commit_details') {
        steps {
            script {
                env.GIT_AUTHOR = sh (script: 'git --no-pager show -s --format=\'%ae\'', returnStdout: true).trim()
            }
        }
    }
  }  
  post {
        always {
          script {
                emailext(
                    subject: "${currentBuild.currentResult}: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                    body: "Please check the details at ${env.BUILD_URL} for more info about the commit made by ${env.GIT_AUTHOR} on $GIT_BRANCH",
                    to: 'exemple@yahoo.com',
                    from: 'exemple@gmail.com',
                )
            }
        }
    }
}
