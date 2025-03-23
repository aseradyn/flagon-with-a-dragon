FROM gitpod/workspace-full

RUN sudo apt-get update && sudo apt-get install php-xdebug -y
