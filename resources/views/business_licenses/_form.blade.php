<div class="row">
    
    <div class="col-md-12">   
        <div class="form-group">

            <label for="reference" class="required">Référence:</label>

                <input type="text" name="reference" value="{{  old('reference') ?? $business_license->reference }}" class="form-control" placeholder="Référence" reauired>

        </div>

         <div class="form-group">

            <label for="year" class="required">Année d'obtention:</label>

                <input type="text" name="year" value="{{  old('year') ?? $business_license->year }}" class="form-control" placeholder="Année" reauired>

        </div>
  
        

    
        <div class="form-group">
            <label for="description" class="required">Notes:</label>
            <textarea rows="8" id="editor" name="description" class="form-control" placeholder="notes" required> {{ $business_license->description }}
            </textarea>
        </div>


         <div class="form-group">

                <input type="file" name="file" class="form-control">

            </div>


    </div>
 </div>