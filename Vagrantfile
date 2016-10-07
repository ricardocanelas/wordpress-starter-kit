
Vagrant.configure("2") do |config|

    config.vm.box = "ubuntu/trusty64"

    config.vm.network :private_network, ip: "192.168.10.11"

    config.vm.synced_folder "sites/", "/var/www/", :owner=> 'www-data', :group=>'www-data'

    config.vm.provider "virtualbox" do |vb|
      vb.name = "WordPressBase"
      vb.gui = false
      vb.memory = "512"
    end

    config.ssh.insert_key = false

    config.vm.provision :shell, keep_color: true, path: "Vagrant.setup.sh"

end
