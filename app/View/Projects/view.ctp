<div class="container">
    <!-- Forms
   ================================================== -->
    <section id="forms">
        <div class="page-header">
            <h3><?php echo h($project['Project']['project_name']); ?>  <a href="javascript:window.history.back();" class="pull-right backButton"></a></h3>
        </div>
        <input type="hidden" name="project_id" id="projectId" value="<?php echo h($project['Project']['id']); ?>"/>
        <div class="row">
            <div class="span11">
                <div class="form-horizontal well control-group">
                    <legend><?php echo h($project['Project']['project_name']); ?></legend>
                    <?php
                    if (!empty($project['ProjectTechnology'])) {
                        $base_url = Configure::read('base_url');
                        foreach ($project['ProjectTechnology'] as $keyTechnology => $technology) {
                            $userTechnologies = array();
                            $imagePath = $base_url . '/img/logos/' . $technology['Technology']['slug'] . '.jpg';
                            if (!empty($technology['User'])) {
                                foreach ($technology['User'] as $userKey => $userData) {
                                    $username = $userData['User']['first_name'] . ' ' . $userData['User']['last_name'];
                                    $userTechnologies[] = array('title' => $username, 'image' => $imagePath, 'url' => $userData['User']['id']);
                                }
                            }
                            $userTechnologiesEncode = json_encode($userTechnologies);
                            ?>
                            <script type="text/javascript">
                                    <?php echo 'objectDatabase' . str_replace('-', '', $technology['Technology']['slug']) . '=' . $userTechnologiesEncode; ?>
                            </script>
                            <script
                                    src="<?php echo $base_url; ?>/js/circleview/<?php echo $technology['Technology']['slug'] . '.js'?>"></script>
                            <div class="mainContentWrapper">
                                <div id="errorDiv<?php echo $technology['Technology']['slug']; ?>"></div>
                                <div
                                        class="mainCircleContainer mainContainer-<?php echo $technology['Technology']['slug'] ?>"
                                        id="<?php echo $technology['Technology']['id'];?>" style="">
                                    <!-- <div id="dragWindow"></div>-->
                                    <div id="s<?php echo $technology['Technology']['id'];?>"
                                         class="smallCircle smallCircle-<?php echo $technology['Technology']['slug']; ?>">
                                        <label
                                                id="circleLabel"><?php echo $technology['Technology']['stream_name'];?></label>
                                    </div>
                                    <div id="b<?php echo $technology['Technology']['id'];?>"
                                         class="bigCircle bigCircle-<?php echo $technology['Technology']['slug'] ?>">
                                        <?php
                                        if (isset($technology['ProjectsUser']) && !empty($technology['ProjectsUser'])) {

                                            foreach($technology['ProjectsUser'] as $userExistData){
                                                ?>
                                                <div
                                                        class="resultCircle  <?php echo "resultCircle-" . $technology['Technology']['slug'] . " r" . $technology['Technology']['id']?>">
                                                    <div class="object-img" style="background-image:url(<?php echo $imagePath; ?>)" id="<?php echo $userExistData['User']['id']; ?>"></div>
                                                    <div class="data"><a href="<?php echo $userExistData['User']['id']; ?>" id="<?php echo $userExistData['User']['id']; ?>"><?php echo $userExistData['User']['first_name'].' '.$userExistData['User']['last_name']; ?></a></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <script type="text/javascript" >
                                                TweenLite.to($("#b"<?php echo $technology['Technology']['id']; ?>), 0.2, {css:{width:150, height:150, marginLeft:-20, marginTop:-20}, ease:Power2.easeOut, onComplete:function () {
                                                    calculatePositionsphp(<?php echo $technology['Technology']['id']; ?>);
                                                }
                                                });
                                            </script>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div id="objectBox"
                                         class="objectBox-<?php echo $technology['Technology']['slug'] ?>">
                                        <div class="corner-stamp" id="add_box"></div>
                                    </div>
                                    <div id="circleBox"
                                         class="circleBox-<?php echo $technology['Technology']['slug'] ?>">
                                        <div class="corner-stamp"
                                             id="show_all-<?php echo $technology['Technology']['slug'] ?>">show all
                                            <br/>objects
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

    </section>

</div>