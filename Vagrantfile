require 'yaml'
require 'fileutils'

domains = {
  bitrix: 'bitrix.webinar.ylab',
}

config = {
  local: './vagrant/config/vagrant-local.yml',
}

# read config
options = YAML.load_file config[:local]

Vagrant.configure("2") do |config|
config.ssh.insert_key = false
  config.vm.box = "centos/7"

  # should we ask about box updates?
  config.vm.box_check_update = options['box_check_update']

  config.vm.provider 'virtualbox' do |vb|
    # machine cpus count
    vb.cpus = options['cpus']
    # machine memory size
    vb.memory = options['memory']
    # machine name (for VirtualBox UI)
    vb.name = options['machine_name']
  end

  # machine name (for vagrant console)
  config.vm.define options['machine_name']

  # machine name (for guest machine console)
  config.vm.hostname = options['machine_name']

  # network settings
  config.vm.network 'private_network', ip: options['ip']

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

   config.vm.synced_folder ".", "/home/bitrix/www", owner: "bitrix", group: "bitrix"

  # disable folder '/vagrant' (guest machine)
   config.vm.synced_folder '.', '/vagrant', disabled: true

  # hosts settings (host machine)
  config.vm.provision :hostmanager
  config.hostmanager.enabled            = true
  config.hostmanager.manage_host        = true
  config.hostmanager.ignore_private_ip  = false
  config.hostmanager.include_offline    = true
  config.hostmanager.aliases            = domains.values

  # post-install message (vagrant console)
  config.vm.post_up_message = "URL: http://#{domains[:bitrix]}"

end
