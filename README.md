# MassMailer [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/k0pernikus/massmailer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/k0pernikus/massmailer/?branch=master)

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

## mail.yml

TODO

## Usage

For a list of commands, run:

    ./bin/console

To check if your email setting is up and running, send yourself a testmail via:

    ./bin console testmail:send
