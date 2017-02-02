FROM nginx:1.10
MAINTAINER Bill Morrison <bill.morrison@teamsolutionz.com>

# install extensions
RUN requirements="vim sudo" \
    && apt-get update && apt-get install -y $requirements

# Add the conf files
ADD nginx.conf /etc/nginx/
ADD minutepad.conf /etc/nginx/conf.d/default.conf
