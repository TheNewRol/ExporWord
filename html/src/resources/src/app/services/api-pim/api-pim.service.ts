import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';

import { Product } from '../../interfaces/product';


@Injectable({
  providedIn: 'root'
})
export class ApiPimService {

  private UrlApi:string = "http://localhost:2912/";

  constructor(private http: HttpClient) {

  }
  /**
   * Obtenemos un listado de productos con todos los datos que vamos a mostrar al usuario Final
   */
  getProducts(): Observable<Product[]> {
    return this.http.get<Product[]>(this.UrlApi + 'productos/');
  }

  downloadWord(productsSelected: Product[]):any{
    let options = {
      headers: { 
        "Content-Type": "application/json", 
      },
      responseType: 'blob' as 'json'
    };
    return this.http.post(this.UrlApi + 'productos/download-word/', productsSelected, options);
  }
}
