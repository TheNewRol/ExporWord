export interface Product {
    id: string;
    ano: string;
    autor: string;
    catalogo: string,
    destacado: string | null;
    especificaciones_tecnicas: string;
    imagenes: object[];
    modelo: string;
    nombre: string | null;
    premios: [];
    texto_lirico: string;
    texto_web: string;
    descripcion: string;
}
