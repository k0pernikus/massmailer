# Under Development, in no useable state as of yet 

# MassMailer

A little tool to send certain mails to a multitude of recievers.

## Requirements

A SMTP E-Mail account. 

## Installation

git clone git@github.com:k0pernikus/massmailer.git
cd massmailer
composer install -o
cp src/Kopernikus/MassMailer/config/{mail.yml.dist,mail.yml}
vim src/Kopernikus/MassMailer/config/mail.yml

Edit the content of your mail.yml

## Usage

For a list of commands, run:

./bin/console

To check if your email setting is up and running, send yourself a testmail via:

./bin console testmail:send