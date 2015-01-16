<div class="accmgr">
    <div class="pageTitle">Account Manager</div>
    <div>
        <div class="newsHeadline">Benutzer</div>
        <ul id="users">
            <li id="user-1" class="user" onclick="editUser(1);">
                <div>
                    <img class="pic" src="<?php echo URL?>public/img/userpics/user_white.png " />
                    <div class="userWrapperSmall">
                        <div style="float:left;">Stefan Haslinger</div>
                    </div>
                    <div class="userWrapperBig" style="margin-left:75px;overflow:hidden;display:none;">
                        <div calss="userInfo" style="float:left;">
                            <br/>
                            <button style="padding:5px 5px;"><i class="fa fa-edit fa-fw"></i></button><br/>
                            <button style="padding:5px 5px;"><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                        <div calss="userInfo" style="float:left; margin-left: 20px;">
                            <input type="text" placeholder="Vorname" style="width:120px"><input type="text" placeholder="Nachname" style="width:120px"><br />
                            <input type="email" placeholder="example@multimediajugend.de" style="width:244px"><br />
                            <input type="text" placeholder="Telefon (+49 123/123 45 67)" style="width:160px;">
                        </div>
                        <div class="userAdress" style="float:left;margin-left:20px;">
                            <input type="text" placeholder="Straße" style="width:200px;"/><input type="text" placeholder="Nr." style="width:40px"><br>
                            <input type="text" placeholder="PLZ (01234)" style="width:90px;" /><input type="text" placeholder="Ort" style="width:150px;"/><br />
                            <button><i class="fa fa-save fa-fw"></i> Speichern</button> <button onclick="cancelEditUser(1);"><i class="fa fa-remove fa-fw"></i> Abbrechen</button>
                        </div>
                        <div class="userPassword" style="float:left;margin-left:20px;">
                            <input type="password" placeholder="Passwort" style="width:150px"/><br/>
                            <input type="password" placeholder="Passwort wiederholen" style="width:150px"/><br/>
                            <button><i class="fa fa-key fa-fw"></i> Ändern</button>
                        </div>
                        <div class="userDelete" style="float:right;">
                            <br/><br/><button><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </li>
            <li id="user-2" class="user" onclick="editUser(2);">
                <div>
                    <img class="pic" src="<?php echo URL?>public/img/userpics/user_white.png " />
                    <div class="userWrapperSmall">
                        <div style="float:left;">Sebastian Flemig</div>
                    </div>
                    <div class="userWrapperBig" style="margin-left:75px;overflow:hidden;display:none;">
                        <div calss="userInfo" style="float:left;">
                            <br/>
                            <button style="padding:5px 5px;"><i class="fa fa-edit fa-fw"></i></button><br/>
                            <button style="padding:5px 5px;"><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                        <div calss="userInfo" style="float:left; margin-left: 20px;">
                            <input type="text" placeholder="Vorname" style="width:120px"><input type="text" placeholder="Nachname" style="width:120px"><br />
                            <input type="email" placeholder="example@multimediajugend.de" style="width:244px"><br />
                            <input type="text" placeholder="Telefon (+49 123/123 45 67)" style="width:160px;">
                        </div>
                        <div class="userAdress" style="float:left;margin-left:20px;">
                            <input type="text" placeholder="Straße" style="width:200px;"/><input type="text" placeholder="Nr." style="width:40px"><br>
                            <input type="text" placeholder="PLZ (01234)" style="width:90px;" /><input type="text" placeholder="Ort" style="width:150px;"/><br />
                            <button><i class="fa fa-save fa-fw"></i> Speichern</button> <button onclick="cancelEditUser(2);"><i class="fa fa-remove fa-fw"></i> Abbrechen</button>
                        </div>
                        <div class="userPassword" style="float:left;margin-left:20px;">
                            <input type="password" placeholder="Passwort" style="width:150px"/><br/>
                            <input type="password" placeholder="Passwort wiederholen" style="width:150px"/><br/>
                            <button><i class="fa fa-key fa-fw"></i> Ändern</button>
                        </div>
                        <div class="userDelete" style="float:right;">
                            <br/><br/><button><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </li>
            <li id="user-3" class="user" onclick="editUser(3);">
                <div>
                    <img class="pic" src="<?php echo URL?>public/img/userpics/user_white.png " />
                    <div class="userWrapperSmall">
                        <div style="float:left;">Martin Meyer</div>
                    </div>
                    <div class="userWrapperBig" style="margin-left:75px;overflow:hidden;display:none;">
                        <div calss="userPicInfo" style="float:left;">
                            <br/>
                            <button style="padding:5px 5px;"><i class="fa fa-edit fa-fw"></i></button><br/>
                            <button style="padding:5px 5px;"><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                        <div calss="userInfo" style="float:left; margin-left: 20px;">
                            <input type="text" placeholder="Vorname" style="width:120px"><input type="text" placeholder="Nachname" style="width:120px"><br />
                            <input type="email" placeholder="example@multimediajugend.de" style="width:244px"><br />
                            <input type="text" placeholder="Telefon (+49 123/123 45 67)" style="width:160px;">
                        </div>
                        <div class="userAdress" style="float:left;margin-left:20px;">
                            <input type="text" placeholder="Straße" style="width:200px;"/><input type="text" placeholder="Nr." style="width:40px"><br>
                            <input type="text" placeholder="PLZ (01234)" style="width:90px;" /><input type="text" placeholder="Ort" style="width:150px;"/><br />
                            <button><i class="fa fa-save fa-fw"></i> Speichern</button> <button onclick="cancelEditUser(3);"><i class="fa fa-remove fa-fw"></i> Abbrechen</button>
                        </div>
                        <div class="userPassword" style="float:left;margin-left:20px;">
                            <input type="password" placeholder="Passwort" style="width:150px"/><br/>
                            <input type="password" placeholder="Passwort wiederholen" style="width:150px"/><br/>
                            <button><i class="fa fa-key fa-fw"></i> Ändern</button>
                        </div>
                        <div class="userDelete" style="float:right;">
                            <br/><br/><button><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <button id="addUser"><i class="fa fa-plus fa-fw"></i> Benutzer hinzufügen</button>
        <div class="newsHeadline">Gruppen</div>
        <ul id="groups">
            <li id="group-1" class="group" onclick="editGroup(1);">
                <div>
                    <img class="pic" src="<?php echo URL?>public/img/userpics/group_white.png" />
                    <div class="groupWrapperSmall">
                        <div style="float:left;margin-left:30px;">Admins</div>
                        <div class="groupMember" style="float:right;">
                            <img alt="Stefan Haslinger" src="<?php echo URL?>public/img/userpics/user_white.png " /><img alt="Sebastian Flemig" src="<?php echo URL?>public/img/userpics/user_white.png " /><img alt="Martin Meyer" src="<?php echo URL?>public/img/userpics/user_white.png " />
                        </div>
                    </div>
                    <div class="groupWrapperBig" style="display:none;">
                        <div calss="groupPicInfo" style="float:left;">
                            <br/>
                            <button style="padding:5px 5px;"><i class="fa fa-edit fa-fw"></i></button><br/>
                            <button style="padding:5px 5px;"><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                        <div calss="groupInfo" style="float:left; margin-left: 20px;">
                            <input type="text" placeholder="Gruppenname" style="width:120px"><br />
                        </div>
                        <div class="groupUserSerach" style="float:left;margin-left:20px;">
                            <input type="text" placeholder="Suche Benutzer" style="width:280px"><br />
                            <div class="groupUserSearchResult" style="height:50px;overflow-y:auto;overflow-x:hidden;background-color:#f3f3f3;">
                                <div style="height:24px;border-bottom: 1px #ddd solid;">
                                    <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                    <div style="float:left;margin-left:5px;">Tilman Bach</div>
                                    <div style="float:right;"><button style="padding:5px;"><i class="fa fa-plus fa-fw"></i></button></div>
                                </div>
                            </div>
                        </div>
                        <div class="groupUserList" style="float:left;margin-left:20px;height:75px;width:280px;overflow-y:auto;overflow-x:hidden;background-color:#f3f3f3;">
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Stefan Haslinger</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Sebastian Flemig</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Martin Meyer</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                        </div>
                        <div class="userDelete" style="float:right;">
                            <br/><br/><button><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </li>
            <li id="group-2" class="group" onclick="editGroup(2);">
                <div>
                    <img class="pic" src="<?php echo URL?>public/img/userpics/group_white.png" />
                    <div class="groupWrapperSmall">
                        <div style="float:left;margin-left:30px;">User</div>
                        <div class="groupMember" style="float:right;">
                            <img alt="Stefan Haslinger" src="<?php echo URL?>public/img/userpics/user_white.png " /><img alt="Sebastian Flemig" src="<?php echo URL?>public/img/userpics/user_white.png " /><img alt="Martin Meyer" src="<?php echo URL?>public/img/userpics/user_white.png " /><img alt="Tilmann Bach" src="<?php echo URL?>public/img/userpics/user_white.png " /><div style="border-left:1px #ddd solid;width:25px;float:right;text-align:center;">...</div>
                        </div>
                    </div>
                    <div class="groupWrapperBig" style="display:none;">
                        <div calss="groupPicInfo" style="float:left;">
                            <br/>
                            <button style="padding:5px 5px;"><i class="fa fa-edit fa-fw"></i></button><br/>
                            <button style="padding:5px 5px;"><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                        <div calss="groupInfo" style="float:left; margin-left: 20px;">
                            <input type="text" placeholder="Gruppenname" style="width:120px"><br />
                        </div>
                        <div class="groupUserSerach" style="float:left;margin-left:20px;">
                            <input type="text" placeholder="Suche Benutzer" style="width:280px"><br />
                            <div class="groupUserSearchResult" style="height:50px;overflow-y:auto;overflow-x:hidden;background-color:#f3f3f3;">
                                <div style="height:24px;border-bottom: 1px #ddd solid;">
                                    <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                    <div style="float:left;margin-left:5px;">Thomas Junghänel</div>
                                    <div style="float:right;"><button style="padding:5px;"><i class="fa fa-plus fa-fw"></i></button></div>
                                </div>
                                <div style="height:24px;border-bottom: 1px #ddd solid;">
                                    <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                    <div style="float:left;margin-left:5px;">Robert Haslinger</div>
                                    <div style="float:right;"><button style="padding:5px;"><i class="fa fa-plus fa-fw"></i></button></div>
                                </div>
                                <div style="height:24px;border-bottom: 1px #ddd solid;">
                                    <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                    <div style="float:left;margin-left:5px;">Sophie Uhlig</div>
                                    <div style="float:right;"><button style="padding:5px;"><i class="fa fa-plus fa-fw"></i></button></div>
                                </div>
                                <div style="height:24px;border-bottom: 1px #ddd solid;">
                                    <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                    <div style="float:left;margin-left:5px;">David Fritsche</div>
                                    <div style="float:right;"><button style="padding:5px;"><i class="fa fa-plus fa-fw"></i></button></div>
                                </div>
                            </div>
                        </div>
                        <div class="groupUserList" style="float:left;margin-left:20px;height:75px;width:280px;overflow-y:auto;overflow-x:hidden;background-color:#f3f3f3;">
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Stefan Haslinger</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Sebastian Flemig</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Martin Meyer</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Daniela Kurz</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Tilmann Bach</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                            <div style="height:24px;border-bottom: 1px #ddd solid;">
                                <img src="<?php echo URL?>public/img/userpics/user_white.png" style="height:24px;float:left;">
                                <div style="float:left;margin-left:5px;">Jörg Weber</div>
                                <div style="float:right;"><button style="padding:5px;"><i class="fa fa-minus fa-fw"></i></button></div>
                            </div>
                        </div>
                        <div class="userDelete" style="float:right;">
                            <br/><br/><button><i class="fa fa-trash fa-fw"></i></button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="newsHeadline">Rechte</div>
    </div>
</div>