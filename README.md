# invite-system-api

A simple invitation REST API

Done with Symfony 4,

## Endpoints

The api offers the following endpoints

* `/users`: Display a list of users in the database
* `/invites`: Display a list of invites on the database
* `/reciever/{id}/view`: View the invites user {id} has received
* `/reciever/{id}/accept_{inv_id}`: User {id} accepts the invite {inv_id}
* `/reciever/{id}/decline_{inv_id}`: User {id} declines the invite {inv_id}
* `/sender/{id}/view`: View the invites user {id} has sent
* `/sender/{id}/send_{usr_id}`: User {id} sends an invite to {usr_id}
* `/sender/{id}/cancel_{inv_id}`: User {id} cancels invite {inv_id}


