import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { map } from 'rxjs/operators';
import { Curso } from './curso';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CursoService {

  url = "http://localhost:8080/api/php/";
  vetor:Curso[]=[];

  constructor(private http: HttpClient) { }

  obterCursos():Observable<Curso[]>{
    return this.http.get(this.url+"listar").pipe(
      map((res:any) => {
        this.vetor = res['cursos'];
        return this.vetor;
      })
    )

  }
  //Cadastrar Curso
  cadastrarCurso(c:Curso):Observable<Curso[]>{
    return this.http.post(this.url+'cadastrar',{cursos:c})
    .pipe(map((res:any)=> {
      this.vetor.push(res['cursos']);
      return this.vetor;
    }))
  }
  //RemoverCurso
  removerCurso(c:Curso): Observable<Curso[]>{
    const params = new HttpParams().set("idCurso", c.idCurso.toString());
    return this.http.delete(this.url+'excluir', {params:params})
    .pipe(map((res:any)=> {
      const filtro = this.vetor.filter((curso) => {
        return +curso['idCurso'] !== +c.idCurso;
      });
      return this.vetor = filtro;
    }))
  }

  //Atualizar curso
  atualizarCurso(c:Curso): Observable<Curso[]>{
    //Executa a alteraçao via url
    return this.http.put(this.url+'alterar', {cursos:c})
    //Percore o vetor para atras do id alterado
    .pipe(map ((res:any) =>{
      const cursoAlterado = this.vetor.find((item) => {
        return +item['idCurso'] === +['idCurso'];
      });

      //Altere o valor do vetor local
      if(cursoAlterado){
        cursoAlterado['nomeCurso'] = c['nomeCurso'];
        cursoAlterado['valorCurso'] = c['valorCurso'];
      }
      return this.vetor;
    }))
}
}