yii2 test

db - mysql<br/>
change db settings in config/db.php

do migrations after db configurating<br/>
yii migrate

Added files due to this test:<br/>
/migrations/..  <br/>
/controllers/TasksController.php<br/>
/models/Tasks.php<br/>
/views/tasks/..  <br/>
folders с js и css<br/>

Commit v0.1 - route update to prettyUrl:
>routeUrl ../index.php?r=tasks%2Findex
routeUrl hostname or hostname/tasks/index