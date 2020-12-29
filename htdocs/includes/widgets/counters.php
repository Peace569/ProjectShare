<?php
    $allowed = array(9);
    if (!in_array(CURRENT_USER_LEVEL,$allowed)) {
        exit;
    }

    /** Get the data to show on the bars graphic */
    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_FILES );
    $total_files = $statement->rowCount();

    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_USERS . " WHERE level = '0'");
    $total_clients = $statement->rowCount();

    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_GROUPS);
    $total_groups = $statement->rowCount();

    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_USERS . " WHERE level != '0'");
    $total_users = $statement->rowCount();

    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_CATEGORIES);
    $total_categories = $statement->rowCount();

    $statement = $dbh->query("SELECT distinct id FROM " . TABLE_DOWNLOADS);
    $total_downloads = $statement->rowCount();
?>
    <div class="row">
        <div class="col-12">
            <div class="widget_counters">
                <ul>
                
                    <li id="bfilemanage">
                        <h6><?php echo $total_files; ?></h6>
                        <h5>Files</h5>
                        <i class="fa fa-file"></i>
                    </li>

                    <li id="bdownloads">
                        <h6><?php echo $total_downloads; ?></h6>
                        <h5>Downloads</h5>
                        <i class="fa fa-download"></i>
                    </li>
                    <li id="bclients">
                        <h6><?php echo $total_clients; ?></h6>
                        <h5>Clients</h5>
                        <i class="fa fa-address-card"></i>
                    </li>
                    <li id="bgroups">
                        <h6><?php echo $total_groups; ?></h6>
                        <h5>Groups</h5>
                        <i class="fa fa-th-large"></i>
                    </li>
                    <li id="bsysuser">
                        <h6><?php echo $total_users; ?></h6>
                        <h5>System Users</h5>
                        <i class="fa fa-users"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  <script>
    var boxFile = document.getElementById('bfilemanage');
    var boxDownload = document.getElementById('bdownloads');
    var boxClient = document.getElementById('bclients');
    var boxGroups = document.getElementById('bgroups');
    var boxSysUser = document.getElementById('bsysuser');
    boxFile.addEventListener('click', function() {
      document.location.href = '/manage-files.php';
    });
    boxDownload.addEventListener('click', function() {
      document.location.href = '/actions-log.php';
    });
    boxClient.addEventListener('click', function() {
      document.location.href = '/clients.php';
    });
    boxGroups.addEventListener('click', function() {
      document.location.href = '/groups.php';
    });
    boxSysUser.addEventListener('click', function() {
      document.location.href = '/users.php';
    });
  </script>