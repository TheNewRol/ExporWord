import { Component } from '@angular/core';
import {SelectionModel} from '@angular/cdk/collections';
import { MatTableDataSource } from '@angular/material/table';
import {animate, state, style, transition, trigger} from '@angular/animations';

import { Product } from '../../interfaces/product';
import { ApiPimService } from '../../services/api-pim/api-pim.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.sass'],
  animations: [
    trigger('detailExpand', [
      state('collapsed', style({height: '0px', minHeight: '0'})),
      state('expanded', style({height: '*'})),
      transition('expanded <=> collapsed', animate('225ms cubic-bezier(0.4, 0.0, 0.2, 1)')),
    ]),
  ],
})
export class ProductsComponent {
  expandedElement: Product | null;
  dataSource = new MatTableDataSource<Product>();
  selection = new SelectionModel<Product>(true,[]);
  displayedColumns: string[] = ['select', 'modelo', 'catalogo'];
  urlImages:string = "https://pre.santacole.com/recursos/imagenes_galeria/";
  
  foods: Food[] = [
    {value: 'steak-0', viewValue: 'Steak'},
    {value: 'pizza-1', viewValue: 'Pizza'},
    {value: 'tacos-2', viewValue: 'Tacos'}
  ];

  constructor(private apiPim: ApiPimService) {
    this.expandedElement = null;
    apiPim.getProducts().subscribe((data:Product[])=>{
      console.log("products",data);
      this.dataSource.data = data;
    });
  }
  download_file(selectecProducts:Product[]){
    console.log(this.selection.selected);
    this.apiPim.downloadWord(selectecProducts).subscribe((data:any)=>{
      console.log("response", data);
      this.manageFile(data, "testFile.doc");
    });
  }
  manageFile(response:any, filname: string):void{
    const dataType = response.type;
    const binaryData = [];
    binaryData.push(response);
    
    const filePatch = window.URL.createObjectURL(new Blob(binaryData, {type: dataType}));
    const downloadFile = document.createElement('a');
    downloadFile.href = filePatch;
    downloadFile.setAttribute('download', filname);
    document.body.appendChild(downloadFile);
    downloadFile.click();
  }
  /** Whether the number of selected elements matches the total number of rows. */
  isAllSelected() {
    const numSelected = this.selection.selected.length;
    const numRows = this.dataSource.data.length;
    return numSelected === numRows;
  }

  /** Selects all rows if they are not all selected; otherwise clear selection. */
  masterToggle() {
    if (this.isAllSelected()) {
      this.selection.clear();
      return;
    }

    this.selection.select(...this.dataSource.data);
  }

  /** The label for the checkbox on the passed row */
  checkboxLabel(product?: Product): string {
    if (!product) {
      return`${this.isAllSelected() ? 'deselect' : 'select'} all`;
    }
    return `${this.selection.isSelected(product) ? 'deselect' : 'select'} row ${product}`;
  }
}

interface Food {
  value: string;
  viewValue: string;
}