FROM nginx:latest
COPY default.conf /etc/nginx/conf.d/default.conf

COPY package*.json ./

#Install NPM
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash && \
    apt-get install -y nodejs

#Yarn Install
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - &&\
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list &&\
    apt-get update && apt-get install yarn

WORKDIR /var/www/

#Install the css/javascript scripts
RUN yarn config set strict-ssl false

EXPOSE 80 443
