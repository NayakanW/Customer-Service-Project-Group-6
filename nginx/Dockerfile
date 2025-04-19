FROM nginx:latest

COPY ./conf/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html/helpdesk

WORKDIR /var/www/html/helpdesk

EXPOSE 80 443
ENTRYPOINT ["nginx", "-g", "daemon off;"]
