<div class="container emp-profile">
    <?php if(isset($user)): ?>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="<?= $user->avatar ?>" alt="" />
                    <div class="mt-2">
                        <?php if($currentUser->id != $user->id):?>
                            <a href="#" class="btn btn-primary">
                                <i class="fa fa-envelope"></i>
                                Message
                            </a>
                            <a href="#" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                Ajouter
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?= "$user->lastname $user->name" ?>
                    </h5>
                    <h6>
                        Web Developer and Designer
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if($currentUser->id == $user->id):?>
                <div class="col-md-2">
                    <a href="edit-profile.php" class="btn btn-outline-primary">Modifier le profil</a>
                </div>
            <?php endif ?>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nom</label>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <?= "$user->lastname $user->name" ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user->email ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tél</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user->phoneNumber ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user->phoneNumber ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Biographie</label>
                            </div>
                            <div class="col-md-6">
                                <p><?= $user->biographie ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <h4 class="text-center">
            Aucun compte n'est associé à cet identifiant
        </h4>
    <?php endif ?>
</div>