# UI TEMPLATE
## Page Template

```
<div class="col-md-12">
</div>
```

## Page Header
```
<div class="page-header">
    <h1>Device Data</h1>
</div>
```
If you want to add button in the header
```
<div class="page-header">
    <router-link to="/device/maintenance/create">
        <button class="btn btn-primary pull-right">
            <i class="glyphicon glyphicon-plus"></i> Add Device</button>
    </router-link>
    <h1>Device Maintenance</h1>
</div>
```

## Search Panel
```
<div class="panel panel-default search-panel">
<form class="form-inline search-form">
</form>
</div>
```
Search Field
```
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
        <input type="text" class="form-control" placeholder="Username" v-model="searchCriteria.username">
    </div>
</div>
```

## Form / Search Buttons
Buttons are right align (float right)
```
<div class="form-group search-button pull-right">
    <button type="button" class="btn btn-primary" @click.prevent="submitForm('device')"> Save</button>
    <button type="button" class="btn btn-default" @click.prevent="resetForm('device')"> Cancel</button>
</div>
<div class="clearfix"></div>
```

## Panel
Always put stuff inside a panel
```
<div class="panel panel-default">
</div>
```

## Colors

* Primary Color: #8FBC39
* Navbar Color: #6B9942
* Danger Color: #d0744f
* Warning Color: #eda41d