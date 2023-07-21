<?php //var_dump($_SERVER);die;
?>
<div class="container app">
    <div class="row app-one">
        <div class="col-sm-4 side">
            <div class="side-one">
                <div class="row heading">
                    <div class="col-sm-3 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <a href="<?= currentHostname() . '/profile.php' ?>">
                                <img src="<?= $currentUser->avatar ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-1 heading-dot pull-right">
                        <i class="fa fa-ellipsis-v fa-2x pull-right" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-2 col-xs-2 heading-compose pull-right">
                        <i class="fa fa-comments fa-2x pull-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row searchBox">
                    <div class="col-sm-12 searchBox-inner">
                        <div class="form-group has-feedback">
                            <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search" />
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="sideBar">
                    <?php foreach ($users as $user) : ?>
                        <a href="<?= currentUrl() ?>?id=<?= $user->id ?>">
                            <div class="row sideBar-body">
                                <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                    <div class="avatar-icon">
                                        <img src="<?= $user->avatar ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-9 col-xs-9 sideBar-main">
                                    <div class="row">
                                        <div class="col-sm-8 col-xs-8 sideBar-name">
                                            <span class="name-meta"><?= "$user->lastname $user->name" ?></span>
                                        </div>
                                        <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                            <span class="time-meta pull-right">18:18 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="side-two">
                <div class="row newMessage-heading">
                    <div class="row newMessage-main">
                        <div class="col-sm-2 col-xs-2 newMessage-back">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-10 col-xs-10 newMessage-title">Nouveau Message</div>
                    </div>
                </div>
                <div class="row composeBox">
                    <div class="col-sm-12 composeBox-inner">
                        <div class="form-group has-feedback">
                            <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People" />
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="row compose-sideBar">
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" />
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                                    <span class="name-meta">John Doe </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                    <span class="time-meta pull-right">18:18 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($selectedUser)) : ?>
            <div class="col-sm-8 conversation">
                <div class="row heading">
                    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <a href="<?= currentHostname() . '/profile.php?id=' . $selectedUser->id ?>">
                                <img src="<?= $selectedUser->avatar ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-7 heading-name">
                        <a href="<?= currentHostname() . '/profile.php?id=' . $selectedUser->id ?>" class="heading-name-meta"><?= "$selectedUser->lastname $selectedUser->name" ?></a>
                        <span class="heading-online">En ligne</span>
                    </div>
                    <div class="col-sm-1 col-xs-1 heading-dot pull-right">
                        <i class="fa fa-ellipsis-v fa-2x pull-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="message" id="conversation">
                    <?php if (isset($messages) && $messages) : ?>
                        <div class=" col-12 message-previous">
                            <div class="col-sm-12 previous">
                                <?php if (count($messages) > 10) : ?>
                                    <a onclick="previous(this)" id="ankitjain28" name="20">
                                        Afficher les messages précedents!
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="message-body">
                            <!-- <div class="row"> -->
                            <?php foreach ($messages as $message) : ?>
                                <?php $currentUserIsSender = $message->sender_id == $currentUser->id; ?>
                                <div class="<?= $currentUserIsSender ? 'message-main-sender' : 'message-main-receiver' ?>">
                                    <div class="<?= $currentUserIsSender ? 'sender' : 'receiver' ?>">
                                        <div class="message-text"><?= $message->content ?></div>
                                        <span class="message-time pull-right"> Sun </span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <!-- </div> -->
                        </div>
                    <?php else : ?>
                        <h3 class="text-center mt-3">Aucun message pour le moment</h3>
                    <?php endif ?>
                </div>
                <form action="<?= currentUrl() . '?id=' . $selectedUser->id ?>" method="post">
                    <div class="row reply">
                        <div class="col-sm-1 col-xs-1 reply-emojis">
                            <i class="fa fa-smile-o fa-2x"></i>
                        </div>
                        <div class="col-sm-9 col-xs-9 reply-main">
                            <textarea class="form-control" rows="1" name="content" id="comment"></textarea>
                        </div>
                        <div class="col-sm-1 col-xs-1 reply-recording">
                            <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
                        </div>
                        <input type="submit" hidden name="sendMessage">
                        <div class="col-sm-1 col-xs-1 reply-send">
                            <button type="submit" class="send-btn" name="sendMessage">
                                <i class="fa fa-send fa-2x" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif ?>
    </div>
</div>