# -*- mode: ruby -*-
# vi: set ft=ruby :

# HAproxy Load Balancer
Vagrant.configure(2) do |config|
    config.vm.box = "centos/7"
  
    config.vm.provider "virtualbox" do |v|
      v.memory = 1024
      v.cpus = 2
    end
  
    config.vm.define "lemp" do |lemp|
      lemp.vm.network :private_network, ip: "10.0.10.70", virtualbox__intnet: "net1"
      lemp.vm.network :forwarded_port, guest: 22, host: 2470, id: "ssh"
	    lemp.vm.network :forwarded_port, guest: 80, host: 9070, id: "http"
      lemp.vm.hostname = "lemp"
      lemp.vm.provision "shell", run: "always", inline: <<-SHELL
      sudo sed -i "s/.*PasswordAuthentication\ no/PasswordAuthentication\ yes/g" /etc/ssh/sshd_config
      sudo systemctl restart sshd
      SHELL
    end
	
  	config.vm.define "ansible" do |ansible|
      ansible.vm.network :private_network, ip: "10.0.10.3", virtualbox__intnet: "net1"
      ansible.vm.network :forwarded_port, guest: 22, host: 2403, id: "ssh"
      ansible.vm.hostname = "ansible"
      ansible.vm.provision "shell", run: "always", inline: <<-SHELL
        sudo sed -i "s/.*PasswordAuthentication\ no/PasswordAuthentication\ yes/g" /etc/ssh/sshd_config
        sudo systemctl restart sshd
        sudo yum install epel-release -y 
        sudo yum install ansible -y 
        sudo cat << EOF > /etc/ansible/hosts
[wordpress]
lemp ansible_host=10.0.10.70
[wordpress:vars]
ansible_user=vagrant
ansible_password=vagrant
EOF
        ansible -m ping lemp
        SHELL
    end
end

#    config.vm.define "haproxy2" do |ha2|
#      ha2.vm.network :private_network, ip: "10.0.10.11", virtualbox__intnet: "net1"
#      ha2.vm.network :forwarded_port, guest: 22, host: 2602, id: "ssh"
#	    ha2.vm.network :forwarded_port, guest: 80, host: 9002, id: "http"
#      ha2.vm.hostname = "haproxy2"
#    end

#	config.vm.define "database" do |db|
#      db.vm.network :private_network, ip: "10.0.10.15", virtualbox__intnet: "net1"
#      db.vm.network :forwarded_port, guest: 22, host: 2603, id: "ssh"
#	     db.vm.network :forwarded_port, guest: 80, host: 9003, id: "http"
#      db.vm.hostname = "database"
#    end

#    config.vm.define "client_machine" do |client|
#      client.vm.network :private_network, ip: "10.0.10.2", virtualbox__intnet: "net1"
#      client.vm.network :forwarded_port, guest: 22, host: 2600, id: "ssh"
#      client.vm.network :forwarded_port, guest: 80, host: 9000, id: "http"
#      client.vm.hostname = "client_machine"
#    end


#	config.vm.define "app1" do |app1|
#      app1.vm.network :private_network, ip: "10.0.10.20", virtualbox__intnet: "net1"
#      app1.vm.network :forwarded_port, guest: 22, host: 2603, id: "ssh"
#	  app1.vm.network :forwarded_port, guest: 80, host: 9003, id: "http"
#      app1.vm.hostname = "app1"
#    end
	
#	config.vm.define "app2" do |app2|
#      app2.vm.network :private_network, ip: "10.0.10.21", virtualbox__intnet: "net1"
#      app2.vm.network :forwarded_port, guest: 22, host: 2604, id: "ssh"
#	  app2.vm.network :forwarded_port, guest: 80, host: 9004, id: "http"
#      app2.vm.hostname = "app2"
#    end
