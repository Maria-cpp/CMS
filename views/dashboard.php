<?php

/** @var $this \zum\phpmvc\View */

$this->title = 'Dashboard'

?>
<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="well dash-box">
                        <h2> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 12 </h2>
                        <h4>Users</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well dash-box">
                        <h2> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 20 </h2>
                        <h4> Posts </h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well dash-box">
                        <h2> <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 5 </h2>
                        <h4> Category </h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well dash-box">
                        <h2> <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 5 </h2>
                        <h4> Tags </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--latest -->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Latest User</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tr> <th>Name</th>
                    <th>Favorite Color</th>
                </tr>
                <tr>
                    <td>Bob</td>
                    <td>Yellow</td>
                </tr>
                <tr>
                    <td>Michelle </td>
                    <td>Purple</td>
                </tr>
            </table>
        </div>
    </div>
</div>