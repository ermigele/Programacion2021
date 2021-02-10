import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url: string = "https://swapi.dev/api";

  constructor(private http: HttpClient) {

  }

  pedirTodosPersonajes() {
    let dir = this.url + "/people/?format=json";
    return this.http.get<any>(dir);
  }

  pedirTodosPlanetas() {
    let dir = this.url + "/planets/?format=json";
    return this.http.get<any>(dir);
  }

  petiADir(url1: string) {
    return this.http.get<any>(url1);
  }

}
