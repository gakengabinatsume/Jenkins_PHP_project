# How to test a PHP file with Jenkins from a private repo in Github ?

**Step 1 : Create an EC2 and install Git & Ansible with user_data to install Jenkins, PHP and Composer**

- Create Ansible structure in GitHub :

   1. Jenkins-playbook.yml

   2. PHP-playbook.yml

   3. Composer-playbook.yml

- Check in AWS instance connect that everything went well and make the necessary commands below
```
cd /var/log/
          
cat user-data.log
cd /Ansible
sudo chmod -R 777 .
cd jenkinstests
git config --global --add safe.directory '*'
pwd
git checkout -f  test1
cd ./playbooks/ #change to playbook folder
ansible-playbook Jenkins-playbook.yml
ansible-playbook PHP-playbook.yml
ansible-playbook Composer-playbook.yml
cd /Ansible
sudo apt install php-xml
sudo apt install php-mbstring
sudo usermod -aG sudo jenkins
sudo apt update && sudo apt install unzip php-zip
```
**Step 2 : Configure Jenkins**

- Take the EC2 public IP and connect on port 8080
(ec2-public-ip:8080) and follow the bellow instructions:

**A : Unlocking Jenkins**

Browse to http://localhost:8080 and from the Jenkins console log output, copy the automatically-generated alphanumeric password (between the 2 sets of asterisks)

![alt text](https://www.jenkins.io/doc/book/resources/tutorials/setup-jenkins-01-unlock-jenkins-page.jpg)

**B : Create first admin user**

![alt text](https://res.cloudinary.com/practicaldev/image/fetch/s--mIX091HC--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_800/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/lx5vfv5a9vo8hhb68cm9.png)

**C : Manage plugins to send e-mail notification**

-System-wide configuration
Before using this plugin from a project, you must first configure some system-wide settings. 
Go to the Jenkins system-wide configuration page (Manage Jenkins, Configure System).
The configuration for this plugin can be found in the section entitled Extended E-mail Notification. 
This configuration should match the settings for your SMTP mail server. 
This section mirrors that of the Mailer plugin in the E-mail Notification section.

![1](https://github.com/user-attachments/assets/31117caa-e839-41ae-b4c0-8373c17a1ac8)
![2](https://github.com/user-attachments/assets/e8e1e45f-d612-4112-8ae1-da92fdf5723a)
![3](https://github.com/user-attachments/assets/8c8fd8c4-6217-4142-8be9-a89b7e32b7be)

You also need to use App passwords from your google account to put as a password.

![4](https://github.com/user-attachments/assets/1460231e-9521-4638-9818-7bf2dc1dddf4)

**Step 3 : Create your Jenkins job**

- Create a Multibranch Pipeline
- Add your GitHub repository.
![Branch Source](https://github.com/gakengabinatsume/DevOps2023/assets/141765846/677b5e18-2443-4a57-9c53-f48ffcada8c8)
- Add your Jenkinsfile path from your repository.
![Build](https://github.com/gakengabinatsume/DevOps2023/assets/141765846/09e5114a-27a9-41b5-acfa-125fcdab610c)

- Scan and trigger the build

