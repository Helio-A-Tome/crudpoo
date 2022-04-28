<?php
        
       class  Contato{
       
                    private $pdo;
                    
                  public  function __construct(){
                 $this->pdo = new PDO("mysql:dbname=crudphp;host=localhost","root","");
               
                  //echo 'conectou';
                  
                  }
                  public function adicionar($email, $nome =''){
                  
                  //passo 1=> verificar se o email ja existe
                  //passo2 => se nao existeir, cadatrar
                  if($this->existeEmail($email)== false){
                     
                     $sql ="INSERT INTO contatos(nome,email) VALUES (:nome,:email)";
                     $sql = $this->pdo->prepare($sql);
                     $sql->bindValue(':nome',$nome);
                     $sql->bindValue(':email',$email);
                     $sql->execute();
                     
                     return true;
                     
                  }else{
                            return false;
                  }
                  
                 
                  
                 }//fim da funçao adicionar
                  //fim create e inicio do read
                  public function getInfo($id){
                  
                            $sql= "SELECT * from contatos where id = :id";
                            $sql = $this->pdo->prepare($sql);
                            $sql->bindValue(':id',$id);
                            $sql->execute();
                            
                            if($sql->rowCount() > 0){
                            
                                   return $sql->fetch();
                                   
                            
                            }else{
                                   return array();
                            }
                  }
                  /*
                   public function getNome($email){
                     $sql = "SELECT nome FROM contatos WHERE email= :email";
                     $sql = $this->pdo->prepare($sql);
                     $sql->bindValue(':email',$email);
                     $sql->execute();
                     
                     if($sql->rowCount()> 0 ){
                            $info = $sql->fetch();
                            
                            return $info['nome'];
                            
                     }else{
                            return '';
                     }
                     
                  
                  }*/
                  public function getAll(){
                            $sql= "SELECT * from contatos";
                            $sql = $this->pdo->query($sql);
                            
                            if($sql->rowCount() > 0){
                            
                                   return $sql->fetchAll();
                                   
                            
                            }else{
                                   return array();
                            }
                  
                  }
                 
                  //fim do read e inicio do update
                  
                  public function editar($nome,$email,$id){
                  
                  
                             $sql= "UPDATE contatos set nome = :nome, email = :email  WHERE id = :id";
                        $sql = $this->pdo->prepare($sql);
                        $sql->bindValue(':nome',$nome);
                        $sql->bindValue(':email',$email);
                        $sql->bindValue(':id',$id);
                        $sql->execute();
                        
              
                  }
                        
                        //fim do update e inicio do delete pelo email
                         public function excluirPeloEmail($email){
                              $sql= "DELETE FROM contatos WHERE email = :email";
                                   $sql= $this->pdo->prepare($sql);
                                   $sql->bindValue(':email',$email);
                                   $sql->execute();
                               
                        }
                        
                  //fim delete pelo Email e inicio de deletar pelo ID
                  public function excluirPeloId($id){
                              $sql= "DELETE FROM contatos WHERE id = :id";
                                   $sql= $this->pdo->prepare($sql);
                                   $sql->bindValue(':id',$id);
                                   $sql->execute();
                               
                        }
                        
                  
                  //fim deletar por ID e inicio da verificação por email
                  
                          private function existeEmail($email){
                          
                            $sql = "SELECT * FROM contatos WHERE email= :email";
                            $sql= $this->pdo->prepare($sql);
                            $sql->bindValue(':email',$email);
                            $sql->execute();
                            
                            if($sql->rowCount() > 0 ){
                                   return true;
                            }else{
                                   return false;
                            }
                            
                            
                          
                          }
                 
                 
       }
                  

?>