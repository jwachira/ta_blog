default_run_options[:pty] = true

#############################################################
#	Application
#############################################################

set :application, "james_blog"
set :deploy_to, "/var/www/apps/#{application}"
#############################################################
#	Apache VHost
#############################################################
set :apache_vhost_name, "#{application}"

#############################################################
#	Settings
#############################################################

default_run_options[:pty] = true
set :use_sudo, true

#############################################################
#	Servers
#############################################################

set :user, "siteforcare"
set :domain, "74.207.254.116:8389"
server domain, :app, :web
role :db, domain, :primary => true

#############################################################
#	Github
#############################################################

set :scm, :git
# set :deploy_via, :remote_cache
set :repository, "git@github.com:jwachira/blog.git"


##########################################################
# Copying remote files from server to server
##########################################################

namespace :deploy do
  desc "Copy Files from remote server to current server"
  task :copy_remote_files, :role => [:app] do
    # sudo "ssh admin@online.itu.edu"
    # run "mysqldump -u root --opt #{remote_database_name} > #{out_put_sql}"
  end
end

#############################################################
#	Symlinks for Static Files
#############################################################

namespace :deploy do
	desc "Set Symlinks for Static Files"
	task :update_config, :roles => [:app] do
    # sudo "ln -sf #{shared_path}/config/database.yml #{release_path}/config/database.yml"
		sudo "ln -sf #{shared_path}/uploads #{release_path}/wordpress/wp-content/uploads"
	end	
end

after "deploy:update_code", "deploy:update_config"

#############################################################
#	Install Missing Gems
#############################################################

namespace :deploy do
	desc "Install Missing Gems"
	task :install_gems, :roles => [:app] do
  #run "cd #{release_path}; sudo /usr/local/bin/rake gems:install --trace"
	end
end

after "deploy:update_config", "deploy:install_gems"

#############################################################
#	Run Migrations and Load Defaults Each Deployment
#############################################################

namespace :deploy do
	desc "Run Migrations and Load Defaults Each Deployment"
	task :update_db, :roles => [:app] do
    # run "cd #{release_path}; sudo /usr/local/bin/rake RAILS_ENV=development db:migrate"
	end
end	

after "deploy:install_gems", "deploy:update_db"
after "deploy:update_db", "passenger:restart"
after "passenger:restart", "passenger:restart_apache"
#############################################################
#	Passenger
#############################################################

namespace :passenger do
  desc "Restart Application"
  task :restart do
    # run "touch #{release_path}/tmp/restart.txt"
  end
  
  desc "Restart Apache"
   task :restart_apache do 
     run "sudo /etc/init.d/apache2 reload"
   end
end
