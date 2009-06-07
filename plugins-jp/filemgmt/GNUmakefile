# $Id$

PLUGIN=		filemgmt

FILES=		config.php filemgmt.php functions.inc history readme.htm \
		update_20080926.html
DATAPUBDIRS=	filemgmt_data/category_snaps filemgmt_data/files/tmp \
		filemgmt_data/snaps/tmp

install:
	@echo "Creating dat directories for filemgmt."
	@for d in $(DATAPUBDIRS); do \
		$(VERBOSE) && echo $(MKDIR) $(DESTDIR)$(GLPUBDIR)/$$d; \
		$(MKDIR) $(DESTDIR)$(GLPUBDIR)/$$d; \
	done

include ../../GNUmakefile.plugins
include ../../GNUmakefile.common
