# Fix MongoDB Common Errors on Ubuntu

## Failed to Unlink Socket `mongodb-27017.sock`.

Error message : `Failed to unlink socket file /tmp/mongodb-27017.sock Operation not permitted`.

* Remove `mongodb-27017.sock` and reload mongod.

    ```console
    $ sudo rm -rf /tmp/mongodb-27017.sock
    $ ls -lsah /tmp/mongodb-27017.sock  
    $ sudo systemctl restart mongod
    ```

    and/or if that doesn't work you can do as below.

* Add owner to mongodb-27017.sock.

    ```console
    $ sudo chown -R $USER /tmp/mongodb-27017.sock
    $ sudo systemctl restart mongod
    ```


## Attempted to create a lock file on a read-only directory: `/data/db`.

Error message : `exception in initAndListen: IllegalOperation: Attempted to create a lock file on a read-only directory: /data/db, terminating`.

* Create folder `/data/db` and add owner.
    
    ```console
    $ sudo mkdir /data/db
    $ sudo chown -R $USER /data/db 
    $ sudo systemctl restart mongod
    ```