<?php
    ob_start();
    session_start();
    //$_REQUEST["msg_no"], $_REQUEST["msg_rep_reason"], $_REQUEST["action"];
        try{            
            require_once("connectBD103G1.php");
            if ($_REQUEST["action"] == 'show') {
                $sql="select * from msg_report where msg_no = :msg_no and mem_no= :mem_no";
                $msgRep=$pdo->prepare($sql);
                $msgRep->bindValue(':msg_no',$_REQUEST["msg_no"]);
                $msgRep->bindValue(':mem_no',$_SESSION["mem_no"]);
                $msgRep->execute();
                if($msgRep->rowCount() == 0){?>
                        <div class="content">
                            <label for="articleLightBoxControl"><div class="cancelBtn"><i class="fa fa-times"></i></div></label>
                            <p>請輸入檢舉原因</p>
                            <form action="msgReport.php" method="get">
                                <input type="hidden" name="msg_no" value="<?php echo $_REQUEST["msg_no"]?>">
                                <input type="hidden" name="action" value="report">
                                <textarea name="msg_rep_reason"></textarea>
                                <span class="btnM"><input class="reportSubmit btnText btnText2" type="submit" value="送出"></span>
                                
                            </form>
                        </div>
                <?php }else{?>
                    <div class="content">
                        <label for="articleLightBoxControl"><div class="cancelBtn"><i class="fa fa-times"></i></div></label>
                        <p>已檢舉</p>
                    </div>
                <?php }
            }elseif ($_REQUEST["action"] == 'report') {
                $sql="insert into msg_report(mem_no, msg_no, msg_rep_reason) values(:mem_no, :msg_no, :msg_rep_reason)";
                $insert=$pdo->prepare($sql);
                $insert->bindValue(':msg_no',$_REQUEST["msg_no"]);
                $insert->bindValue(':mem_no',$_SESSION["mem_no"]);
                $insert->bindValue(':msg_rep_reason',$_REQUEST["msg_rep_reason"]);
                $insert->execute();
                header('location:'.$_SESSION['where']);
            }
        }catch(PDOExeption $e){
            echo "錯誤原因 : " , $e->getMessage() , "<br>";
            echo "錯誤行號 : " , $e->getLine() , "<br>";
        } ?>