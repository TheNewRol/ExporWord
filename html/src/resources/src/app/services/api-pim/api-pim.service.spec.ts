import { TestBed } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import {HttpClientModule} from '@angular/common/http';


import { ApiPimService } from './api-pim.service';
import { Product } from '../../interfaces/product';

describe('ApiPimService', () => {
  let productsTest: Product[] = [];
  let service: ApiPimService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule], 
      providers: [ApiPimService]
    });
    service = TestBed.inject(ApiPimService);
    productsTest = [{
      "id": "376",
      "nombre": null,
      "modelo": "Americana", 
      "catalogo": "Apliques", 
      "ano": "1964",
      "texto_web": "", 
      "texto_lirico": "<p>La serie Americana fue concebida por Miguel Milá.</p>",
      "destacado": null,
      "descripcion": "",
      "especificaciones_tecnicas": "<p>Estructura metálica en níquel satinado</p>",
      "autor": "Miguel Milá",
      "premios": [], 
      "imagenes": [{
        "id_img": "3248",
        "id_producto": "376", 
        "foto_x150": "AMERICANA_apliques/00_americana_CarmeMasia_1400239839-O1.jpg",
        "foto_x600": "AMERICANA_apliques/00_americana_CarmeMasia_1400239839-O2.jpg",
        "foto_x1000": "AMERICANA_apliques/00_americana_CarmeMasia_1400239839-O3.jpg",
        "foto_x1700": "AMERICANA_apliques/00_americana_CarmeMasia_1400239839-O4.jpg",
        "foto_x2400": "00_americana_CarmeMasia_1400239839-O5.jpg",
        "foto_72dp": null
      }] 
    }];
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should return products list', () => {
    service.getProducts().subscribe(
      producto => expect(producto).toEqual(productsTest)
    );
  });

  it('should send data to donwload file', ()=>{
    service.downloadWord(productsTest).subscribe((data:any) => {
      console.log(data);
    })
  });
});
