<?php
    require_once("connectDb.php");

    $finalHtml = "";

    for($i = 1; $i <= 31; $i+=2)
    {
        $events=mysql_query("SELECT id, name, location, addedby, completedby, date FROM events WHERE date = ".$i);
        if(mysql_num_rows($events) == 0)
        {
            $finalHtml = $finalHtml."<div class = 'leftEvents' style = 'visibility:hidden;'></div>";
        }
        else
        if(mysql_num_rows($events) == 1)
        {
            while($singleEvent = mysql_fetch_array($events, MYSQL_NUM))
            {
                $finalHtml = $finalHtml."<div class = 'leftEvents'>
                        <div id = 'eventTitle' title = '".$singleEvent[1]."'>".$singleEvent[1]."</div>
                        <div class = 'showMenuButtons' title='Show menu' id = '".$singleEvent[0]."'>
                            <img src = 'Images/menu.png' id = 'showMenuIcon'/>
                        </div>
                        <div id = 'eventLocation'>
                            <div id = 'eventLocationIconBox' title='Location'>
                                <img src='Images/locationIcon.png' id = 'eventLocationIcon'/>
                            </div>
                            <div id = 'eventLocationName' title = '".$singleEvent[2]."'>".$singleEvent[2]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventPerson'>
                            <div id = 'eventPersonIconBox' title='Added by'>
                                <img src='Images/user.png' id = 'eventPersonIcon'/>
                            </div>
                            <div id = 'eventPersonName' title = '".$singleEvent[3]."'>".$singleEvent[3]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventCompleted'>
                            <div id = 'eventCompletedIconBox' title='Completed by'>
                                <img src='Images/complete.png' id = 'eventCompletedIcon'/>
                            </div>
                            <div id = 'eventCompletedName' title = '".$singleEvent[4]."'>".$singleEvent[4]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div class = 'eventMenu' id = 'm".$singleEvent[0]."'>
                            <div id = 'eventTitle' title = '".$singleEvent[1]."'>".$singleEvent[1]."</div>
                            <div class = 'finishButton' id = '".$singleEvent[0]."'>
                                <div id = 'finishButtonIconBox'>
                                    <img src='Images/completed.png' id = 'finishButtonIcon'/>
                                </div>
                                <div id = 'finishButtonText'>
                                    Complete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'deleteButton' id = '".$singleEvent[0]."'>
                                <div id = 'deleteButtonIconBox'>
                                    <img src='Images/delete.png' id = 'deleteButtonIcon'/>
                                </div>
                                <div id = 'deleteButtonText'>
                                     Delete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'cancelButton' id = '".$singleEvent[0]."'>
                                <div id = 'cancelButtonIconBox'>
                                    <img src='Images/cancel.png' id = 'cancelButtonIcon'/>
                                </div>
                                <div id = 'cancelButtonText'>
                                     Cancel
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }
        else
        {
            $finalBubble = "<div class='leftEvents'><div class = 'container'>";
            $hiddenEvents = "";
            while($singleEvent = mysql_fetch_array($events, MYSQL_NUM))
            {
                $finalBubble = $finalBubble."<div class = 'multipleEvents' id = '".$singleEvent[0]."'>".$singleEvent[1]."</div>";
                $hiddenEvents = $hiddenEvents."<div class = 'hiddenEvent' id = 'h".$singleEvent[0]."'>
                <div id = 'eventTitle'><div class = 'eventTitleIconBox'>
                                <img src='Images/back.png' id = 'eventTitleIcon' title = 'Back'/>
                             </div><div id = 'eventTitleText' title = '".$singleEvent[1]."'>".$singleEvent[1]."</div>
                             <div class = 'showMenuButtonsMultiL' title='Show menu' id = '".$singleEvent[0]."'>
                            <img src = 'Images/menu.png' id = 'showMenuIcon'/>
                        </div><div class = 'clear'></div></div>
                        <div id = 'eventLocation'>
                            <div id = 'eventLocationIconBox' title='Location'>
                                <img src='Images/locationIcon.png' id = 'eventLocationIcon'/>
                            </div>
                            <div id = 'eventLocationName'>".$singleEvent[2]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventPerson'>
                            <div id = 'eventPersonIconBox' title='Added by'>
                                <img src='Images/user.png' id = 'eventPersonIcon'/>
                            </div>
                            <div id = 'eventPersonName'>".$singleEvent[3]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventCompleted'>
                            <div id = 'eventCompletedIconBox' title='Completed by'>
                                <img src='Images/complete.png' id = 'eventCompletedIcon'/>
                            </div>
                            <div id = 'eventCompletedName'>".$singleEvent[4]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div class = 'eventMenu' id = 'm".$singleEvent[0]."'>
                            <div id = 'eventTitle'>".$singleEvent[1]."</div>
                            <div class = 'finishButton' id = '".$singleEvent[0]."'>
                                <div id = 'finishButtonIconBox'>
                                    <img src='Images/completed.png' id = 'finishButtonIcon'/>
                                </div>
                                <div id = 'finishButtonText'>
                                    Complete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'deleteButton' id = '".$singleEvent[0]."'>
                                <div id = 'deleteButtonIconBox'>
                                    <img src='Images/delete.png' id = 'deleteButtonIcon'/>
                                </div>
                                <div id = 'deleteButtonText'>
                                     Delete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'cancelButton' id = '".$singleEvent[0]."'>
                                <div id = 'cancelButtonIconBox'>
                                    <img src='Images/cancel.png' id = 'cancelButtonIcon'/>
                                </div>
                                <div id = 'cancelButtonText'>
                                     Cancel
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                        </div></div>";
            }
            $finalBubble = $finalBubble."</div>".$hiddenEvents."</div>";
            $finalHtml = $finalHtml.$finalBubble;
        }
    }

    for($i = 33; $i <= 61; $i+=2)
    {
        $events=mysql_query("SELECT id, name, location, addedby, completedby, date FROM events WHERE date = ".$i);
        if(mysql_num_rows($events) == 0)
        {
            $finalHtml = $finalHtml."<div class = 'leftEvents' style = 'visibility:hidden;'></div>";
        }
        else
        if(mysql_num_rows($events) == 1)
        {
            while($singleEvent = mysql_fetch_array($events, MYSQL_NUM))
            {
                $finalHtml = $finalHtml."<div class = 'leftEvents'>
                        <div id = 'eventTitle'>".$singleEvent[1]."</div>
                        <div class = 'showMenuButtons' title='Show menu' id = '".$singleEvent[0]."'>
                            <img src = 'Images/menu.png' id = 'showMenuIcon'/>
                        </div>
                        <div id = 'eventLocation'>
                            <div id = 'eventLocationIconBox' title='Location'>
                                <img src='Images/locationIcon.png' id = 'eventLocationIcon'/>
                            </div>
                            <div id = 'eventLocationName'>".$singleEvent[2]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventPerson'>
                            <div id = 'eventPersonIconBox' title='Added by'>
                                <img src='Images/user.png' id = 'eventPersonIcon'/>
                            </div>
                            <div id = 'eventPersonName'>".$singleEvent[3]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventCompleted'>
                            <div id = 'eventCompletedIconBox' title='Completed by'>
                                <img src='Images/complete.png' id = 'eventCompletedIcon'/>
                            </div>
                            <div id = 'eventCompletedName'>".$singleEvent[4]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div class = 'eventMenu' id = 'm".$singleEvent[0]."'>
                            <div id = 'eventTitle'>".$singleEvent[1]."</div>
                            <div class = 'finishButton' id = '".$singleEvent[0]."'>
                                <div id = 'finishButtonIconBox'>
                                    <img src='Images/completed.png' id = 'finishButtonIcon'/>
                                </div>
                                <div id = 'finishButtonText'>
                                    Complete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'deleteButton' id = '".$singleEvent[0]."'>
                                <div id = 'deleteButtonIconBox'>
                                    <img src='Images/delete.png' id = 'deleteButtonIcon'/>
                                </div>
                                <div id = 'deleteButtonText'>
                                     Delete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'cancelButton' id = '".$singleEvent[0]."'>
                                <div id = 'cancelButtonIconBox'>
                                    <img src='Images/cancel.png' id = 'cancelButtonIcon'/>
                                </div>
                                <div id = 'cancelButtonText'>
                                     Cancel
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }
        else
        {
            $finalBubble = "<div class='leftEvents'><div class = 'container'>";
            $hiddenEvents = "";
            while($singleEvent = mysql_fetch_array($events, MYSQL_NUM))
            {
                $finalBubble = $finalBubble."<div class = 'multipleEvents' id = '".$singleEvent[0]."'>".$singleEvent[1]."</div>";
                $hiddenEvents = $hiddenEvents."<div class = 'hiddenEvent' id = 'h".$singleEvent[0]."'>
                <div id = 'eventTitle'><div class = 'eventTitleIconBox'>
                                <img src='Images/back.png' id = 'eventTitleIcon' title = 'Back'/>
                             </div><div id = 'eventTitleText'>".$singleEvent[1]."</div>
                             <div class = 'showMenuButtonsMultiL' title='Show menu' id = '".$singleEvent[0]."'>
                            <img src = 'Images/menu.png' id = 'showMenuIcon'/>
                        </div><div class = 'clear'></div></div>
                        <div id = 'eventLocation'>
                            <div id = 'eventLocationIconBox' title='Location'>
                                <img src='Images/locationIcon.png' id = 'eventLocationIcon'/>
                            </div>
                            <div id = 'eventLocationName'>".$singleEvent[2]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventPerson'>
                            <div id = 'eventPersonIconBox' title='Added by'>
                                <img src='Images/user.png' id = 'eventPersonIcon'/>
                            </div>
                            <div id = 'eventPersonName'>".$singleEvent[3]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div id = 'eventCompleted'>
                            <div id = 'eventCompletedIconBox' title='Completed by'>
                                <img src='Images/complete.png' id = 'eventCompletedIcon'/>
                            </div>
                            <div id = 'eventCompletedName'>".$singleEvent[4]."</div>
                            <div class = 'clear'>
                            </div>
                        </div>
                        <div class = 'eventMenu' id = 'm".$singleEvent[0]."'>
                            <div id = 'eventTitle'>".$singleEvent[1]."</div>
                            <div class = 'finishButton' id = '".$singleEvent[0]."'>
                                <div id = 'finishButtonIconBox'>
                                    <img src='Images/completed.png' id = 'finishButtonIcon'/>
                                </div>
                                <div id = 'finishButtonText'>
                                    Complete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'deleteButton' id = '".$singleEvent[0]."'>
                                <div id = 'deleteButtonIconBox'>
                                    <img src='Images/delete.png' id = 'deleteButtonIcon'/>
                                </div>
                                <div id = 'deleteButtonText'>
                                     Delete event
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                            <div class = 'cancelButton' id = '".$singleEvent[0]."'>
                                <div id = 'cancelButtonIconBox'>
                                    <img src='Images/cancel.png' id = 'cancelButtonIcon'/>
                                </div>
                                <div id = 'cancelButtonText'>
                                     Cancel
                                </div>
                                <div class = 'clear'>
                                </div>
                            </div>
                        </div></div>";
            }
            $finalBubble = $finalBubble."</div>".$hiddenEvents."</div>";
            $finalHtml = $finalHtml.$finalBubble;
        }
    }

    echo($finalHtml);
?>












































