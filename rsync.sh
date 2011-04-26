rsync -avz . -e ssh kkn@kkn.lppm.upi.edu:/data/unit/LEMBAGA/lppm/www/html/kkn/html --exclude="rsync.sh" --exclude=".git/*" --exclude="assets/*"
