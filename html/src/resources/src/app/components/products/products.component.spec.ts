import {By} from '@angular/platform-browser';
import { NgModule, CUSTOM_ELEMENTS_SCHEMA, NO_ERRORS_SCHEMA, Component} from '@angular/core';
import { async, ComponentFixture, TestBed, tick, fakeAsync, flush } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
//import {animate, state, style, transition, trigger} from '@angular/animations';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppComponent } from 'src/app/app.component';

//Angular Material
import { MatIconModule } from '@angular/material/icon';
import { MatTableModule } from '@angular/material/table';
import { MatSelectModule } from '@angular/material/select';
import { MatCheckboxModule } from '@angular/material/checkbox';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatButtonModule } from '@angular/material/button';

import { Product } from 'src/app/interfaces/product';
import { ProductsComponent } from './products.component';
import { ApiPimService } from 'src/app/services/api-pim/api-pim.service';

@Component({
  selector: 'app-products',
  template: '<div></div>'
})
export class MockProducts {}

describe('ProductsComponent', () => {
  let apiPim: ApiPimService;
  let productComponent: ProductsComponent;
  let fixture: ComponentFixture<ProductsComponent>;
  let productsTest: Product = {
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
  };

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ProductsComponent ],
      imports: [
        MatIconModule,
        MatButtonModule,
        MatTableModule,
        MatSelectModule,
        MatCheckboxModule,
        MatFormFieldModule,
        HttpClientTestingModule,
        BrowserAnimationsModule,
      ],
      providers:[ApiPimService],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    }).compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductsComponent);
    productComponent = fixture.componentInstance;
    apiPim = TestBed.inject(ApiPimService);
    fixture.detectChanges();
  });

  it('should create view Products', () => {
    expect(productComponent).toBeTruthy();
  });
  
  it('is all selectec ', fakeAsync(() => {
    apiPim.getProducts().subscribe((data)=>{
      productComponent.dataSource.data = data;
      expect([productsTest]).toEqual(productComponent.dataSource.data);

      fixture.whenStable().then(() => {
        fixture.detectChanges();
        let tableRows = fixture.debugElement.query(By.css('input'));
        tableRows.nativeElement.click();
        fixture.detectChanges();

        expect(productComponent.dataSource.data).toEqual(productComponent.selection.selected);
      });
    })
  }));

  it('should download file', () => {
    productComponent.download_file([productsTest]);
  });

  it('should deselect all', () => {
    let checkProdcuct = productComponent.checkboxLabel();
    expect('deselect all').toBe(checkProdcuct);
  });

  it('should select product', () => {
    let checkProdcuct = productComponent.checkboxLabel(productsTest);
    expect('select row [object Object]').toBe(checkProdcuct);
  });
});
