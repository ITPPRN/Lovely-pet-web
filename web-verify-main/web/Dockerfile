FROM nginx:latest


# Install required dependencies for GD extension
RUN apt-get update && apt-get install -y \
    libjpeg-dev \
    libpng-dev \
    && rm -rf /var/lib/apt/lists/*

COPY . .

# คัดลอกไฟล์ default.conf ของ Nginx จากโฟลเดอร์ของโปรเจ็ค
COPY ../default.conf/default.conf /etc/nginx/conf.d/default.conf

# คัดลอกไฟล์ nginx.conf ของ Nginx จากโฟลเดอร์ของโปรเจ็ค
COPY ../default.conf/nginx.conf /etc/nginx/nginx.conf

# คัดลอกไฟล์เนื้อหาของโค้ดของเว็บไซต์ไปยัง /var/www/html
COPY ../src /var/www/html

# Set permissions for /var/www/html (use chmod)
RUN chmod -R 777 /var/www/html

# Expose the port your web server listens on (if necessary)
EXPOSE 80






