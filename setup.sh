#!/bin/bash

# Tạo thư mục uploads
mkdir -p uploads

# Danh sách các lab
labs=(
    case_sensitive
    alt_extension
    double_ext
    null_byte
    symlink
    zipslip
    png_rce
)

# Tạo thư mục cho từng lab
for lab in "${labs[@]}"; do
    mkdir -p "uploads/$lab"
done

# Tạo .htaccess cho lab png_rce
cat <<EOF > uploads/png_rce/.htaccess
AddType application/x-httpd-php .png
Options +Indexes
EOF

echo "Setup hoàn tất!"
