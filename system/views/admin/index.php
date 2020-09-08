<?php require_once("public/page-parts/site-header.php") ?>
<?php require_once("public/page-parts/sidebar.php") ?>
<?php require_once("public/page-parts/navbar.php") ?>
<style>
    /* .project-tab {
    padding: 10%;
    margin-top: -8%;
} */
    .project-tab #tabs {
        background: #007b5e;
        color: #eee;
    }

    .project-tab #tabs h6.section-title {
        color: #eee;
    }

    .project-tab #tabs .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 16px;
        font-weight: bold;
    }

    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 16px;
        font-weight: 600;
    }

    .project-tab .nav-link:hover {
        border: none;
    }

    .project-tab thead {
        background: #f3f3f3;
        color: #333;
    }

    .project-tab a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }

    .show {
        display: inline !important;
    }
</style>

<section id="tabs" class="project-tab">
    <!-- <div class="container"> -->
    <div class="bg-white mx-3">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Phones/Models</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Add Country/State</a>
                        <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Dispute</a>
                            <a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="false">Users</a> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3 border">
                                        <form id="newphone" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Brand Name</label>
                                                        <input type="text" class="form-control" name="phone" placeholder="Brand name" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="button" id="addphone" class="btn btn-orange" value="Submit">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border">
                                        <form id="form" method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Brand</label>
                                                        <select class="form-control" id="brand" name="brand">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Model</label>
                                                        <input type="text" class="form-control" name="model" placeholder="Model" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Card Slot</label>
                                                        <!-- <input type="text" class="form-control" name="card_slot" placeholder="SD card slot" id=""> -->
                                                        <select class="form-control" name="card_slot" id="card_slot">
                                                            <option>Select Card Slot</option>
                                                            <option>None</option>
                                                            <option>MicroSD, up to 16GB</option>
                                                            <option>MicroSD, up to 32GB</option>
                                                            <option>MicroSD, up to 64GB</option>
                                                            <option>MicroSD, up to 128GB</option>
                                                            <option>MicroSD, up to 256GB</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Main Camera</label>
                                                        <!-- <input type="text" class="form-control" name="main_cam" placeholder="Rear camera" id=""> -->
                                                        <select class="form-control" name="main_cam" id="main_cam">
                                                            <option>Select Main Camera</option>
                                                            <option>5 MP</option>
                                                            <option>8 MP</option>
                                                            <option>10 MP</option>
                                                            <option>11 MP</option>
                                                            <option>12 MP</option>
                                                            <option>13 MP</option>
                                                            <option>14 MP</option>
                                                            <option>15 MP</option>
                                                            <option>16 MP</option>
                                                            <option>17 MP</option>
                                                            <option>18 MP</option>
                                                            <option>19 MP</option>
                                                            <option>20 MP</option>
                                                            <option>22 MP</option>
                                                            <option>24 MP</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Operating System</label>
                                                        <!-- <input type="text" class="form-control" name="OS" placeholder="Operating system" id=""> -->
                                                        <select class="form-control" name="OS" id="OS">
                                                            <option>Select Operating System</option>
                                                            <option>Android</option>
                                                            <option>iOS</option>
                                                            <option>Windows</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Sim</label>
                                                        <!-- <input type="text" class="form-control" name="sim" placeholder="Sim" id=""> -->
                                                        <select class="form-control" name="sim" id="sim">
                                                            <option>Select Sim</option>
                                                            <option>Single Mini-SIM</option>
                                                            <option>Single Nano-SIM</option>
                                                            <option>Dual Mini-SIM</option>
                                                            <option>Dual Nano-SIM</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Selfie Camera</label>
                                                        <!-- <input type="text" class="form-control" name="selfie_cam" placeholder="Selfie camera" id=""> -->
                                                        <select class="form-control" name="selfie_cam" id="selfie_cam">
                                                            <option>Select Selfie Camera</option>
                                                            <option>None</option>
                                                            <option>2 MP</option>
                                                            <option>3 MP</option>
                                                            <option>5 MP</option>
                                                            <option>8 MP</option>
                                                            <option>10 MP</option>
                                                            <option>11 MP</option>
                                                            <option>12 MP</option>
                                                            <option>13 MP</option>
                                                            <option>14 MP</option>
                                                            <option>15 MP</option>
                                                            <option>16 MP</option>
                                                            <option>17 MP</option>
                                                            <option>18 MP</option>
                                                            <option>19 MP</option>
                                                            <option>20 MP</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Battery (mAh)</label>
                                                        <input type="text" class="form-control" name="battery" placeholder="Battery capacity" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Model image</label>
                                                        <input type="file" name="file" class="form-control-file" id="img">
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="submit" class="btn btn-orange" value="Submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3 border">
                                        <form id="country1" method="post">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Country</label>
                                                        <input type="text" class="form-control" name="country" placeholder="Country" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="button" id="addCountry" class="btn btn-orange" value="Submit">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 border">
                                        <form id="stateform" method="post">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Country</label>
                                                        <select class="form-control" id="countrys" name="countryasa">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">State</label>
                                                        <input type="text" class="form-control" name="state" placeholder="State" id="">
                                                    </div>
                                                </div>


                                            </div>


                                            <input type="button" id="addstate" class="btn btn-orange" value="Submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Contest Name</th>
                                        <th>Date</th>
                                        <th>Award Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">Work 1</a></td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Work 2</a></td>
                                        <td>Moe</td>
                                        <td>mary@example.com</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Work 3</a></td>
                                        <td>Dooley</td>
                                        <td>july@example.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</section>




<?php require_once("public/page-parts/site-footer.php") ?>
<script src="/public/static/js/new-model.js"></script>
<script src="/public/static/js/new-phone.js"></script>
<script src="/public/static/js/new-country.js"></script>
<script src="/public/static/js/new-state.js"></script>
<script src="/public/static/js/use-phonedetails.js"></script>
<script src="/public/static/js/use-country.js"></script>