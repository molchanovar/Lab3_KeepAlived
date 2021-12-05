# -*- mode: ruby -*-
# vi: set ft=ruby :

# HAproxy Load Balancer
Vagrant.configure(2) do |config|
    config.vm.box = "centos/7"
  
    config.vm.provider "virtualbox" do |v|
      v.memory = 2048
      v.cpus = 2
    end
  
    config.vm.define "haproxy1" do |ha1|
      ha1.vm.network "public_network", ip: "192.168.1.14"
    end
	
    config.vm.define "haproxy2" do |ha2|
      ha2.vm.network "public_network", ip: "192.168.1.15"
    end

    config.vm.define "haproxy3" do |db|
      db.vm.network "public_network", ip: "192.168.1.16"
    end
end
