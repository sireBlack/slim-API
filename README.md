## SLIM-API

A simple API written in SLIP PHP

To Use

- [Make sure you have a server installed](https://www.apachefriends.org/download.html).

- [Make sure you have a composer installed](https://getcomposer.org/download/).

- Clone the repository and extract to your server folder (htdocs, www...)

- Open command prompt and navigate to your working folder

- run composer install to install dependencies

- Create a virtual host so that you have something like localhost/slimapi

- create your database and import the vcustomer.sql file

## END-POINTS

- All Customers

    Method - get

    - /api/customers

- Specific customer

    Method - get

    - /api/customer/id

- Add Customer

    Method - post

    - /api/customer/add

- Update customer 

    Method - put

    - /api/customer/update/id

- Delete customer

    Method - delete

    - /api/customer/delete/id
