import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Curso } from './curso';
import { CursoService } from './curso.service';

@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css']
})
export class CursoComponent implements OnInit {

  url = "http://localhost:8080/api/php/";
 
  vetor: Curso[] = [];
  curso: Curso = new Curso();
  
  constructor(private cursoServise:CursoService) { }

  ngOnInit() 
  {
   this.selecao();
  }

  cadastro(){
    this.cursoServise.cadastrarCurso(this.curso).subscribe(
      (res: Curso[]) => {

        //Adicionar dados ao vetor
        this.vetor = res;
        //Limpar os atributos    
      
        
        this.curso.nomeCurso = "";
        this.curso.valorCurso = 0;

        //Atualizar a listagem
        this.selecao()
      }
    )
  }
  selecao(){
    this.cursoServise.obterCursos().subscribe(
      (res: Curso[]) =>{
        this.vetor = res;
      }
    )
  }
  alterar(){
    this.cursoServise.atualizarCurso(this.curso).subscribe(
      (res) => {
        //Atualizar vetor
        this.vetor = res;
        //Limpar valores do objeto
        //Limpar valores do objeto
        this.curso.nomeCurso = "";
        this.curso.valorCurso = 0;
        //Atualizar a listagem
        this.selecao();
      }
    )
  }
  remover(){
    this.cursoServise.removerCurso(this.curso).subscribe(
      (res : Curso[]) => {
        this.vetor = res;

        this.curso.nomeCurso = "";
        this.curso.valorCurso = 0;
      } 
    )
  }
  //Selecionar curso especifico
  selecionarCurso(c:Curso){
    
    this.curso['idCurso'] = c['idCurso'];
    this.curso['nomeCurso'] = c['nomeCurso'];
    this.curso['valorCurso'] = c['valorCurso'];
  }

}
